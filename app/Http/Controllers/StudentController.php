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

    public function reservations(Request $request)
    {
        $approved = [];
        $not_approved = [];
        $request->user()->authorizeRoles('student');
        $tasks = $request->user()->tasks()->get();
        foreach ($tasks as $task)
        {
            if ($task->pivot->approved) $approved[] = $task;
            else $not_approved[] = $task;
        }

        return view('student.reservation', ['approved' => $approved, 'not_approved' => $not_approved]);
    }

    public function destroy(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('student');
        $task->users()->detach($request->user()->id);
        return redirect('/');
    }
}
