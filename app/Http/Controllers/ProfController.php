<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Task;


class ProfController extends Controller
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

    public function edit(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('professor');
        return view('prof.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('professor');
        $task->update([
            'name' => $request->input('name'),
            'name_en' => $request->input('name_en'),
            'goal' => $request->input('goal'),
            'college_type' => $request->input('college_type'),
        ]);

        return redirect('/');
    }

    public function destroy(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('professor');
        $task->users()->detach();
        $task->delete();
        return redirect('/');
    }

    public function newTask(Request $request)
    {
        $request->user()->authorizeRoles('professor');
        return view('prof.new');
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles('professor');
        $request->user()->tasks()->create($request->all());
        return redirect('/');
    }

    public function reservations(Request $request)
    {
        $request->user()->authorizeRoles('professor');

        $users = User::with('tasks')->get();
        foreach ($users as $user)
        {
            if($user->hasRole('student')) $data[] = $user;
        }

        return view('prof.reservation', ['data' => $data]);

    }

    public function approve(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('professor');
        $flag = 0;

        foreach (User::with('tasks')->get() as $user)
        {
            if(isset($user->tasks()->where('id',$task->id)->first()->pivot->approved) && $user->hasRole('student') && $user->tasks()->where('id',$task->id)->first()->pivot->approved == 1) $flag = 1;
        }

        foreach (Task::with('users')->get() as $t)
        {
            if (isset($t->users()->where('id', $request->input('user'))->first()->pivot->approved) && $t->users()->where('id', $request->input('user'))->first()->pivot->approved == 1) $flag = 1;

        }

        if ($flag == 0) $task->users()->updateExistingPivot($request->input('user'),['approved'=>1]);

        return $this->reservations($request);
    }

    public function disapprove(Request $request, Task $task)
    {
        $request->user()->authorizeRoles('professor');

        $task->users()->updateExistingPivot($request->input('user'),['approved'=>null]);

        return $this->reservations($request);
    }
}
