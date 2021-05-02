<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Purchase;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin) {
            $users_count = User::where('admin', 0)->count();
            $issue_items_count = Purchase::where('status','ISSUED')->sum('quantity');
            $users_issued_count = Purchase::distinct()->count('user_id');
            return view('adminPanel', compact('users_count','issue_items_count','users_issued_count'));
        }
        else {
            return redirect('/home');
        }
    }

}
