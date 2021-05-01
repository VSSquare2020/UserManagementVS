<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use DB;

class ProductsController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin) {
            $products = DB::table('products')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(20);

            return view('products.index', compact('products'));
        }
        else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->admin) {
            return view('products.create');
        }
        else {
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->admin) {

            $validatedData = $request->validate([
                'name' => 'required',
                'product_life' => 'required|numeric',
                'quantity' => 'required|numeric',
            ]);
            
            $product = new Product;
            $product->product_name = $request->name;
            $product->product_life_month = $request->product_life;
            $product->quantity = $request->quantity;
            if($request->hasFile('image')) {
                $product->image = $request->image->store('product_pics', 'public');
            }
            $product->save();

            // $role = new Role;
            // $role->user_id = $user->id;
            // $role->role = $request->role;
            // $role->permission = $request->permission;
            // $role->save();

            return back()->with(['message'=>'Product added Successfully']);
            
        }
        else {
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->admin) {
            $user = User::find($id);
            return view('users.view', compact('user'));
        }
        else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->admin) {
            $product = Product::findOrFail($id);
            return view('products.edit', compact('product'));

        }
        else {
            return redirect('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->admin) {
            $validatedData = $request->validate([
                'name' => 'required',
                'product_life' => 'required|numeric',
                'quantity' => 'required|numeric',
            ]);

            $product = Product::findOrFail($id);

            $product->product_name = $request->name;
            $product->product_life_month = $request->product_life;
            $product->quantity = $request->quantity;
            if($request->hasFile('image')) {
                $product->image = $request->image->store('product_pics', 'public');
            }
            $product->save();

            return back()->with(['message' => 'Product Updated Successfully']);
        }
        else {
            return redirect('/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->admin) {
            $product = Product::findOrFail($id);
            $product->delete();
            return back()->with(['message' => 'Product Deleted Successfully']);
            //return redirect('/admin-panel')->with('msg_success', 'User Deleted Successfully');
        }
        else {
            return redirect('/home');
        }
    }

    
}
