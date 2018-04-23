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

}
