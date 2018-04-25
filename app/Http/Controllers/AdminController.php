<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Task;

class AdminController extends Controller
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
     * @param Request $request, User $user
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, User $user)
    {
        $request->user()->authorizeRoles('admin');
        return view('admin.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->user()->authorizeRoles('admin');
        if(null !== $request->input('password'))
        {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'college_type' => $request->input('college_type'),
                'password' => bcrypt($request->input('password'))
            ]);
        }
        else
        {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'college_type' => $request->input('college_type')
            ]);
        }

        $user->roles()->sync([$user->id => ['role_id' => $request->input('role')]]);
        return redirect('/');

    }

    public function destroy(Request $request, User $user)
    {
        $request->user()->authorizeRoles('admin');
        $user->roles()->detach();
        $user->tasks()->detach();
        $user->delete();
        return redirect('/');
    }

}
