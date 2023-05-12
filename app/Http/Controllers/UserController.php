<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function users_add(Request $request)
    {
        $teams = Team::all()->pluck('name', 'id')->toArray();
        $roles = Role::all()->pluck('display_name', 'id')->toArray();

        if ($request->isMethod('post')) {
            User::create([
                'team' => $request->input('team'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role'),
            ]);
            return redirect(url('users'));
        }

        return view('users.add', compact('teams', 'roles'));
    }

    public function user(Request $request, User $user)
    {
        if($request->isMethod('POST')){
            $this->validate($request, [
                'first_name' => 'required|alpha|max:255',
                'last_name' => 'required|alpha|max:255',
                'email' => 'required|email|max:255',
                'team' => 'numeric|exists:teams,id',
                'password' => 'max:255'
            ]);
            $user_data = $request->all();

            if(!empty($user_data['password'])){
                $user_data['password'] = bcrypt($user_data['password']);
            } else unset($user_data['password']);

            $user->update($user_data);
        }
        $teams = Team::all()->pluck('name', 'id');
        $teams[''] = ' - - No team - - ';

        return view('users.user', compact('user', 'teams'));
    }

    public function roles(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->input('action') == 'new_role') {

                $this->validate($request, [
                    'name' => 'required|max:255|unique:roles',
                    'display_name' => 'required|max:255',
                    'description' => 'max:255'
                ]);

                $role = new Role();
                $role->name = $request->input('name');
                $role->display_name = $request->input('display_name');
                $role->description = $request->input('description');
                $role->save();

            }

            if ($request->input('action') == 'update_roles') {

                $new_permissions = $request->input('permissions');
                foreach (Role::all() as $role) {
                    if (array_key_exists($role->id, $new_permissions)) {
                        $role->savePermissions($new_permissions[$role->id]);
                    } else {
                        $role->savePermissions([]);
                    }
                }
            }
        }
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.roles', compact('roles', 'permissions'));
    }

    public function teams(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->input('action') == 'new_team') {
                $this->validate($request, [
                    'name' => 'required|max:255|unique:teams'
                ]);

                Team::create(['name' => $request->input('name')]);
            }

            if ($request->input('action') == 'rename_team') {
                $this->validate($request, [
                    'id' => 'required|exists:teams',
                    'name' => 'required|max:255|unique:teams'
                ]);
                Team::where(['id' => $request->input('id')])
                    ->update(['name' => $request->input('name')]);
            }

            if ($request->input('action') == 'delete_team') {
                $team = Team::find($request->input('id'));
                if($team->users->count() > 0){
                    return "There are users in this team";
                }
            }
        }
        $teams = Team::all();
        return view('users.teams', compact('teams'));
    }
}
