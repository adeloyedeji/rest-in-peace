<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
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

	public function roles(Request $request) {
		$roles = Role::orderBy('created_at', 'desc')->get();
		if($request->ajax()) {
			return response()->json($roles);
		}
		return view('acl.roles', compact('roles'));
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

		return redirect()->back()->with('title','users','roles');
	}

	public function show(Request $request, $rID) {
		if($request->ajax()) {
			$role = Role::find($rID);
			if(count($role) > 0) {
				return response()->json($role);
			} else {
				return response()->json("404");
			}
		} else {
			return response()->json("silence is a virtue");
		}
	}

	public function store(Request $request) {
		if($request->ajax()) {
			$data = array(
				'name'		=>	$request->name,
				'slug'		=>	$request->slug,
				'description'	=>	$request->description
			);

			$validator = \Validator::make($data, [
				'name'		=>	'required|string',
				'slug'		=>	'required|string',
				'description'	=>	'required|string'
			]);

			if($validator->fails()) {
				return response()->json($validator->errors());
			}

			$isRole = Role::where('name', $data['name'])->orWhere('slug', $data['slug'])->first();
			if(count($isRole) > 0) {
				return response()->json("exists");
			} else {
				return response()->json(Role::create($data));
			}
		}
	}

	public function update(Request $request, $id) {
		if($request->ajax()) {
			$data = array(
				'name'			=>	$request->name,
				'slug'			=>	$request->slug,
				'description'	=>	$request->description
			);

			$validator = \Validator::make($data, [
				'name'			=> 'required|string',
				'slug'			=> 'required|string',
				'description'	=> 'nullable|string'
			]);

			if($validator->fails()) {
				return response()->json($validator);
			}

			$role = Role::find($id);
			if(count($role) > 0) {
				$role->update($data);
				return response()->json('ok');
			}
			return response()->json('404');
		}
	}

	public function destroy(Request $request, $roleID) {
		if($request->ajax()) {
			$role = Role::find($roleID);
			if(count($role) > 0) {
				$role->delete();
				return response()->json("ok");
			} else {
				return response()->json("404");
			}
		}
	}

	public function delete($id){
		$title = 'Role Manage Page';

		$role = Role::find($id);
		if ($role != null) {
			$role->delete();
			Session::flash('message','Role successfully deleted');
		}else{

			Session::flash('error','Unable to delete role');
		}

		$users = User::orderBy('created_at', 'desc')->get();
		$roles = Role::orderBy('name', 'asc')->get();

		return redirect()->back()->with('title','users','roles');
	}
}
