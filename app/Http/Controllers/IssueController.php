<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Purchase;
use App\Product;
use PDF;


class IssueController extends Controller
{
    public function index()
    {
        if(Auth::user()->admin) {
            return view('issue.issue');
        }
        else {
            return redirect('/home');
        }
    }
    
    public function fetchUser(Request $request)
    {
        if($request->has('clo_no'))
        {
            $userData = User::where('clo_card_no',$request->clo_no)->with('purchased')->first();

            if ($userData) {
                return
                [
                'data'=>$userData,
                'status'=>'success',
                'message' => 'success'
                ];
            }
            else{
                return
                [
                'status'=>'failed',
                'message'=>'user does not exit'
                ];
            }

        }
        else
        {
            return 
            [
               'status'=>'failed'
            ];
        }

    }

    public function issue_details($id)
    {
        if($id)
        {
            if (Auth::user()->admin) {
                $user = User::where('clo_card_no', $id)->first();
                $products = Purchase::where('user_id', $user->id)->with('product')->get();

                return view('issue.issue_details', compact('products', 'user'));
            }
            else {
                return redirect('/home');
            }
        }
    }

    public function create($id)
    {
        if($id)
        {
            if(Auth::user()->admin) {

                $user = User::where('id', $id)->first();
                $products = Product::get();


                return view('issue.create',compact('products','user'));
            }
            else {
                return redirect('/home');
            }
        }
    }

    public function store(Request $request)
    {
       // $user_id = $request->user_id;
        if($request->has('product_id') && $request->has('quantity'))
        {
            $products = $request->product_id;
            $quantity = $request->quantity;
            $count = count($products);
            $userData = User::where('id',$request->user_id)->first();

            foreach($products as $key=>$val)
            {
               // dd($request);
                $productInfo = Product::where('id',$val)->first();
                $purchaseData = Purchase::where('user_id',$userData->id)->where('product_id',$val)->where('status','ISSUED')->get();

                if ($purchaseData && count($purchaseData)==0) {
                    if ($productInfo->quantity >= $request->quantity[$key]) {
                        $saveToDb = Purchase::create([
                    'user_id' => $request->user_id,
                    'battery' => $userData->battery,
                    'product_id' => $val,
                    'quantity' => $request->quantity[$key],
                    'status' => 'ISSUED',
                    'due_date' => Carbon::now()->addMonths($productInfo->product_life_month),
                ]);
                        if ($saveToDb) {
                            $quant = $productInfo->quantity - (int)$request->quantity[$key];
                            // dd($quant,$request->quantity[$key]);
                            $productUpdate = Product::where('id', $val)->update([
                        'quantity' => $quant
                    ]);

                            $count--;
                        }
                    } else {
                        $msg = 'Only '.$productInfo->quantity.' items of '.$productInfo->product_name.' is available';
                        return back()->with(['error'=>$msg]);
                    }
                }
                else {
                    $msg = $productInfo->product_name.' is already issued to him';
                    return back()->with(['error'=>$msg]);
                }



            }
            return back()->with(['success'=>'Issued Successfully']);


            // if($count <= 0)
            // {

            //     return back()->with(['message'=>'Issued Successfully']);
            // }
            // else
            // {
            //     return back()->with(['error'=>'Some items not available']);

            // }
        }
    }

    public function view()
    {
        $products = Purchase::with(['user','product'])->get();
        return view('issue.issue_data',compact('products'));

    }

    public function return(Request $request,$id)
    {
        //dd($request,$id);
        if($id)
        {
            $issueData = Purchase::where('id',$id)->where('user_id',$request->uid)->first();
            $updateQty = Product::where('id',$issueData->product_id)->first();
           // dd($issueData,$updateQty,$id,$request->uid);
            $qty = $updateQty->quantity + $issueData->quantity;

            $updateQty->update([
                'quantity' => $qty
            ]);

             Purchase::where('id',$id)->update([
                'status'=>'RETURNED',
                'due_date'=>null,
                'return_on' => Carbon::now()
            ]);

                return back();
        }
    }

    public function DueDateView()
    {
        return view('issue.due_date');
    }

    public function fetchIssueData(Request $request){
        $validatedData = $request->validate([
            'month' => 'required',
            'year' => 'required',
            'battery' => 'sometimes',
        ]);

        if($request->has('battery') && $request->battery != "")
        {
            $products = Purchase::whereMonth('due_date',$request->month)->whereYear('due_date',$request->year)->where('status','ISSUED')->with(['product','user'])->get();
        }
        else{
            $products = Purchase::whereMonth('due_date',$request->month)->whereYear('due_date',$request->year)->where('status','ISSUED')->with(['product','user'])->get();
        }

        return view('issue.due_date_data',compact('products'));
    }


    public function downloadPdf()
    {
        if(Auth::user()->admin)
        {
            $products = Purchase::with(['user','product'])->get();

            $pdf = PDF::loadView('issue.due_date_pdf',compact('products'));
            return $pdf->download('issue_datails.pdf');
            //PDF::download('users.index');
        }
        else {
            return redirect('/home');
        }
    }

    public function downloadDuePdf($id)
    {
        $data = strtotime($id);
        $month = date('m',$data);
        $year = date('Y',$data);
        $products = Purchase::whereMonth('due_date',$month)->whereYear('due_date',$year)->where('status','ISSUED')->with(['product','user'])->get();

        $pdf = PDF::loadView('issue.due_date_pdf',compact('products'));
        return $pdf->download('due_datails.pdf');
    }
}
