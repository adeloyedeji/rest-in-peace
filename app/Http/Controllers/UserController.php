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
    		'fname' => 'required|string|max:255',
    		'oname' => 'required|string|max:255',
    		'lname' => 'required|string|max:255',
    		'username' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users',
    		'password' => 'required|min:6|confirmed',
    		'phone' => 'required|numeric',
    		'role' => 'required',
    	]);

    	$request['password'] = bcrypt($request->input('password'));

    	$user = User::create($request->all());
    	$user->assignRole($request['role']);

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
