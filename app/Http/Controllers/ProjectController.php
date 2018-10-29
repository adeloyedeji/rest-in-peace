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
        // $project = \App\Project::find($id);

        // if(!$project) {
        //     abort(404);
        // }

        // return view('pages.projects.show', [
        //     'project'   =>  $project
        // ]);
        $projects = \App\Project::orderBy('updated_at', 'asc')->get();
        return view('pages.projects.show', compact('id', 'projects'));
        // return view('pages.sv.projects.show', compact('id', 'projects'));
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

    public function getProjects() {
        // $projects = \App\Project::orderBy('created_at', 'desc')->get();
        return response()->json(\App\Project::orderBy('created_at', 'desc')->get());
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
            'role_id'   =>  \Auth::id(),
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

        $project = \App\Project::where('title', $data['title'])->orWhere('code', $data['code'])->first();

        if(count($project) > 0)
        {
            return response()->json("duplicate");
        }
        else
        {
            $project = \App\Project::create($data);
        }

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

    public function searchProjects($query) {
        return response()->json(\App\Project::where('title', 'LIKE', '%' . $query . '%')->orWhere('code', 'LIKE', '%' . $query . '%')->orderBy('created_at', 'desc')->get());
    }

    public function searchBenByProject($pid, $query) {
        $result = [];
        $bens = $this->projectBenIdsArray($pid)->toArray();
        $matchedBens = \App\Beneficiary::where('fname', 'LIKE', '%' . $query . '%')
                                ->orWhere('lname', 'LIKE', '%' . $query . '%')
                                ->orWhere('oname', 'LIKE', '%' . $query . '%')
                                ->orWhere('phone', 'LIKE', '%' . $query . '%')
                                ->orWhere('email', 'LIKE', '%' . $query . '%')
                                ->orWhere('tribe', 'LIKE', '%' . $query . '%')
                                ->orWhere('household_head', 'LIKE', '%' . $query . '%')
                                ->orWhere('city', 'LIKE', '%' . $query . '%')
                                ->get();
        foreach($matchedBens as $b):
            if(in_array($b->id, $bens)):
                $result[] = $b;
            endif;
        endforeach;

        return response()->json($result);
    }

    public function projectBenIds($pid) {
        return \App\ProjectBeneficiary::where('project_id', $pid)->get();
    }

    public function projectBenIdsArray($pid) {
        return collect($this->projectBenIds($pid))->pluck('beneficiary_id');
    }

    public function getProjectBen($pid) {
        $ben = [];
        $benIds = $this->projectBenIdsArray($pid)->toArray();
        foreach($benIds as $id):
            $ben[] = \App\Beneficiary::find($id);
        endforeach;
        return response()->json($ben);
    }

    public function addBeneficiary(Request $request) {
        $bid = $request->bid;
        $pid = $request->project;

        $ben = \App\Beneficiary::find($bid);

        if($ben) {
            $project = \App\Project::find($pid);

            if($project) {
                $data = array(
                    'project_id'        =>  $pid,
                    'beneficiary_id'    =>  $bid
                );
                // check if beneficiary has been previously added to the project.
                $projectBen = \App\ProjectBeneficiary::where('project_id', $pid)->where('beneficiary_id', $bid)->first();
                if(count($projectBen) > 0)
                {
                    \Session::flash('warning', 'Beneficiary already exists in project: ' . $project->title . '.');
                    return redirect()->back();
                }
                else
                {
                    $projectBen = \App\ProjectBeneficiary::create($data);
                    \Session::flash('success', 'Beneficiary successfully added to project');
                    return redirect()->back();
                }
            } else {
                \Session::flash('error', 'Project not found!');
                return redirect()->back();
            }
        } else {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back();
        }
    }

    public function beneficiaryProjects(Request $request, $benID)
    {
        $projects = [];
        $projectsIDS = \App\ProjectBeneficiary::where('beneficiary_id', $benID)->get();
        if(count($projectsIDS) > 0)
        {
            foreach($projectsIDS as $id)
            {
                $projects[] = \App\Project::find($id->project_id);
            }
        }
        if($request->ajax())
        {
            return response()->json($projects);
        }
        return $projects;
    }

    public function beneficiaryProperties(Request $request, $benID, $type)
    {
        $properties = \App\Property::where('beneficiaries_id', $benID)->where('type', $type)->get();
        if($request->ajax())
        {
            return response()->json($properties);
        }
        return $properties;
    }
}
