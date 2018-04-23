<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->user()->hasRole('admin'))
        {
            $data = User::where('id','!=',$request->user()->id)->with('roles')->get();
            return view('home', ['data' => $data, 'admin' => true]);
        }

        elseif ($request->user()->hasRole('professor'))
        {
            return view('home', ['professor' => true]);
        }

        else
        {
            return view('home', ['student' => true]);
        }
    }

    public function proba(Request $request)
    {
        $user = User::where('id',1)->first();

        return $request->user()->roles()->first()->name;
    }
}
