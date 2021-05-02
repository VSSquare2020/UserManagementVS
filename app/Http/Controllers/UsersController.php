<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Hash;
use DB;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin) {
            $users = DB::table('users')
                        ->where('admin', '=', 0)
                        ->orderBy('created_at', 'DESC')
                        ->get();
                        // ->paginate(20);

            return view('users.index', compact('users'));
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
            return view('users.create');
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
                'army_no' => 'required|unique:users',
                'clo_no' => 'required',
                'rank' => 'required',
                'battery' => 'required',
            ]);
            
            $user = new User;
            $user->name = $request->name;
            $user->email = "useremail".$request->clo_no;
            $user->army_number = $request->army_no;
            $user->clo_card_no = $request->clo_no;
            $user->rank = $request->rank; 
            $user->battery = $request->battery;
            $user->password = Hash::make('password'.$request->army_no);
            if($request->hasFile('image')) {
                $user->image = $request->image->store('profile_pics', 'public');
            }
            $user->save();

            // $role = new Role;
            // $role->user_id = $user->id;
            // $role->role = $request->role;
            // $role->permission = $request->permission;
            // $role->save();

            return redirect('/admin-panel')->with('msg_success', 'User Created Successfully');
            
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
            $user = User::findOrFail($id);

          
            return view('users.edit', compact('user'));

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
            dd($request);
            $validatedData = $request->validate([
                'name' => 'required',
                'army_no' => 'required',
                'clo_no' => 'required',
                'rank' => 'required',
                'battery' => 'required',
            ]);

            $user->name = $request->name;
            $user->email = "useremail";
            $user->army_number = $request->army_no;
            $user->clo_card_no = $request->clo_no;
            $user->rank = $request->rank; 
            $user->battery = $request->battery;

            if($request->hasFile('image')) {
                $user->image = $request->image->store('profile_pics', 'public');
            }
            $user->save();

            return redirect('/admin-panel')->with('msg_success', 'User Updated Successfully');
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
            $user = User::find($id);
            $role = Role::where('user_id', '=', $id)->firstOrFail();
            $role->delete();
            $user->delete();
            return redirect('/admin-panel')->with('msg_success', 'User Deleted Successfully');
        }
        else {
            return redirect('/home');
        }
    }

    public function excelImport()
    {
        return view('users.excel_import');
    }

    public function SaveExcel(Request $request)
    {
      //  dd($request->file());

        $validatedData = $request->validate([
            'user_data' => 'required'
        ]);

        $path = $request->file('user_data');

        // $import = new UsersImport();
        // $import->import($path);
        $data = Excel::import(new UsersImport, $path);

        dd($data);
    }
}
