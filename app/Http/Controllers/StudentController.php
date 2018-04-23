<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Task;


class StudentController extends Controller
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

    public function reserve(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('student');
        $request->user()->tasks()->attach($task->id);
        return redirect('/');
    }

}
