<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Task;

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
            $data = $request->user()->tasks()->get();
            return view('home', ['data' => $data, 'professor' => true]);
        }

        elseif ($request->user()->hasRole('student'))
        {
            $data = [];
            $temp = Task::with('users')->get();
            foreach ($temp as $t)
            {
                foreach ($t->users as $x)
                {
                    $array[] = $x->pivot->user_id;
                }

                if(!in_array($request->user()->id, $array)) $data[] = $t;
            }
            return view('home', ['data' => $data, 'student' => true]);

        }
    }

    public function proba(Request $request)
    {
        $user = User::where('id',1)->first();

        return $request->user()->tasks()->detach();
    }
}
