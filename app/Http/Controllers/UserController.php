<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use App\Role;
use Session;
use Redirect;

class UserController extends Controller
{
	public function __construct(){

	    //$this->middleware('auth')->except(['index', 'show']);
	    $this->middleware('auth');

	}


    public function index(){
		$title = 'User Manage Page';
    	$users = User::orderBy('created_at', 'desc')->paginate(5);
		$roles = Role::all();
    	return View('acl.index',compact('title','users','roles'));
    }

    public function create(Request $request){
    	$title = 'User Manage Page';

    	$request->validate([
    		'fname' => 'required|string|max:191',
    		'oname' => 'nullable|string|max:191',
    		'lname' => 'required|string|max:191',
    		'email' => 'string|email|max:100|unique:users',
    		'password' => 'required|min:6|confirmed',
    		'phone' => 'required|numeric',
    		'role_id' => 'required',
    	]);

        $request['password'] = bcrypt($request->input('password'));
        $name = substr($request['fname'], 0);
        $request['username'] = strtolower($name[0]) .".".$request['lname'];


    	$user = User::create($request->all());
    	// $user->assignRole($request['role']);

    	$users = User::orderBy('created_at', 'desc')->paginate(5);
    	$roles = Role::orderBy('name', 'asc')->get();

    	Session::flash('message','User successfully created');

    	return redirect()->back()->with('title','users','roles');

    }

    public function delete($id){

    	$title = 'User Manage Page';

    	$user = User::find($id);
    	if ($user != null) {

    		$user->delete();

    		foreach ($user->roles as $role) {

    			$user->revokeRole($role->id);
    		}

    		Session::flash('message','User successfully deleted');
    	}else{
    		Session::flash('error','Unable to delete user');
    	}

    	$users = User::orderBy('created_at', 'desc')->paginate(5);
    	$roles = Role::orderBy('name', 'asc')->get();


    	return redirect()->back()->with('title','users','roles');
    }

    public function show($id)
    {
        $title = 'User Manage Page';

		$user = User::find($id);
        $roles = Role::orderBy('name', 'asc')->get();
        return view("acl.user_edit",compact("user","title","roles"));
    }

    public function edit(Request $request, $id)
    {
		$title = 'User Manage Page';
		$users = User::orderBy('created_at', 'desc')->paginate(5);
		$roles = Role::orderBy('name', 'asc')->get();
        $request->validate([
            'fname' => 'required|string|max:255',
            'oname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|numeric',
			'role'	=> 'required|numeric',
			'password'	=>	'nullable|confirmed'
		]);

        try {
            $user = User::find($id);

			// foreach($request->roles as $r) {
			// 	$roleExists = \App\RoleUser::where('user_id', $user->id)->where('role_id', $r)->first();
			// 	if(count($roleExists) <= 0) {
			// 		\App\RoleUser::create([
			// 			'user_id'	=>	$user->id,
			// 			'role_id'	=>	$r
			// 		]);
			// 	}
			// }

			$userData = array(
				'fname'	=>	$request->fname,
				'lname'	=>	$request->lname,
				'oname'	=>	$request->oname,
				'role_id' => $request->role,
				'password'	=>	$request->password ? bcrypt($request->password) : $user->password,
			);

            if ($user->update($userData)) {
                Session::flash('message','User successfully updated');
            } else {
                Session::flash('error','Unable to updated Record');
            }
            return redirect()->back()->with('title','users','roles');
        } catch (Exception $e) {
            Session::flash('error',$e->message());
            return redirect()->back()->with('title','users','roles');
        }
	}

	public function destroy(Request $request, $userID) {
		$title = 'User Manage Page';
    	$users = User::orderBy('created_at', 'desc')->paginate(5);
		$roles = Role::all();

		$user = \App\User::find($userID);
		if(count($user) > 0) {
			$user->delete();
			// delete all roles assigned.
			// $roles = \App\RoleUser::where('user_id', $userID)->get();
			// if(count($roles) > 0) {
			// 	foreach($roles as $role) {
			// 		$role->delete();
			// 	}
			// }
			Session::flash('message','User account deleted.');
			if($request->ajax()) {
				return response()->json('ok');
			} else {
				return redirect()->back()->with('title', 'users', 'roles');
			}
		} else {
			Session::flash('error', 'User not found!');
			if($request->ajax()) {
				return response()->json('404');
			} else {
				return redirect()->back()->with('title', 'users', 'roles');
			}
		}
	}

    public function status($id){
    	$title = 'User Manage Page';
    	$user = User::find($id);
    	if ($user != null && $user->status == 0) {

    		$user->status = 1;
    		$user->save();
    	}else{
    		$user->status = 0;
    		$user->save();
    	}


    	$users = User::orderBy('created_at', 'desc')->paginate(5);
    	$roles = Role::orderBy('name', 'asc')->get();

    	return redirect()->back()->with('title','users','roles');

    }
}
