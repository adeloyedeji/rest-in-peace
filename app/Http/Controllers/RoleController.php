<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Session;

class RoleController extends Controller
{
   	public function __construct(){

	    //$this->middleware('auth')->except(['index', 'show']);
	    $this->middleware('auth');

	}

	public function index(){
		$title = "Role Page";

		$roles = Role::orderBy('created_at', 'desc')->get();
		return view("acl.role",compact("title","roles"));
	}

	public function create(Request $request){
		$title = "Role Page";
		$request->validate([
			'name' => 'required',
			'slug' => 'required',
			'description' => 'required',
		]);

		$request['name'] = strtolower($request->input('name'));

		$is_exist = Role::where('name', $request['name'])->first();

		if ($is_exist == null) {

			$role = Role::create($request->all());
			Session::flash('message','Role successfully created');
		}else{
			Session::flash('error','Role exist');
		}

		$roles = Role::orderBy('created_at', 'desc')->get();
		
		return view("acl.role",compact("title","roles"));
	}

	public function delete($id){
		$title = 'Role Manage Page';

		$role = Role::find($id);
		if ($role != null) {
			$role->delete();
			$users = User::orderBy('created_at', 'desc')->get();
			$roles = Role::orderBy('name', 'asc')->get();
			Session::flash('message','Role successfully deleted');
			return redirect()->back()->with('title','users','roles');
		}

		Session::flash('error','Unable to delete role');
		return redirect()->back()->with('title','users','roles');
	}
}
