<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = \App\Project::orderBy('created_at', 'desc')->paginate(20);
        return view('pages.projects.index', [
            'projects'  =>  $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = \App\Project::find($id);

        if(!$project) {
            abort(404);
        }

        return view('pages.projects.show', [
            'project'   =>  $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function find($id) {
        $project = \App\Project::find($id);

        return response()->json($project);
    }

    public function save(Request $request) {
        $data = array(
            'code'      =>  $request->code,
            'title'     =>  $request->title,
            'address'   =>  $request->address,
        );

        $validator = \Validator::make($data, [
            'code'      =>      'required|string|unique:projects',
            'title'     =>      'required|string',
            'address'   =>      'required|string'
        ]);

        if($validator->fails()) {
            return $validator->errors();
        }

        $data['created_by'] = \Auth::id();

        $project = \App\Project::create($data);

        \App\ProjectStatus::create([
            'project_id'    =>  $project->id
        ]);

        return response()->json("success");
    }

    public function updateProject(Request $request) {
        $id = $request->id;
        $data = array(
            'code'      =>  $request->code,
            'title'     =>  $request->title,
            'address'   =>  $request->address,
        );

        $validator = \Validator::make($request->all(), [
            'id'        =>      'required|integer',
            'code'      =>      'required|string',
            'title'     =>      'required|string',
            'address'   =>      'required|string'
        ]);

        if($validator->fails()) {
            return $validator->errors();
        }

        $project = \App\Project::find($id);

        if(!$project) {
            return response()->json("404");
        }

        $status = $project->update($data);

        return response()->json($status);
    }

    public function delete(Request $request) {
        $id = $request->id;

        $project = \App\Project::find($id);

        if(!$project) {
            return response()->json("404");
        }

        $project->delete();

        return response()->json(1);
    }

    public function updateStatus(Request $request) {
        $status = $request->status;
        $id = $request->id;

        $project = \App\ProjectStatus::where('project_id', $id)->update(['status' => $status]);

        return response()->json($project);
    }
}
