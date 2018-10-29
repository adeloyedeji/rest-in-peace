<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StructureValuationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project_id = 0;
        $beneficiaries = []; $project;
        $total_valuation = 0;
        $projects       = \App\Project::all();

        if($request->query('project_id')) {
            $project_id = $request->query('project_id');
        } else {
            $project_id = 0;
        }

        if($project_id == "all" || $project_id <= 0) {
            $beneficiaries = \App\Beneficiary::paginate(15);
            // total valuation will be for all beneficiaries
            $total_valuation = $this->getTotalValuation("all");
        } else {
            $project = \App\Project::find($project_id);
            $beneficiaries = \DB::table('project_beneficiaries')
                                ->join('beneficiaries', 'project_beneficiaries.beneficiary_id', '=', 'beneficiaries.id')
                                ->where('project_beneficiaries.project_id', $project_id)
                                ->paginate(15);
            //total valuation will be for beneficiaries in the selected project.
            $total_valuation = $this->getTotalValuation($project_id);
        }

        foreach($beneficiaries as $b) {
            $b->total_structures = $this->getBeneficiaryStructureTotal($b->id);
            $b->total_amount = $this->getBeneficiaryStructureValuation($b->id);
        }
        return view('pages.valuations.structures.index', compact('beneficiaries', 'projects', 'project_id', 'project', 'total_valuation'));
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
        //
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

    public function projectsIndex() {
        return view('pages.sv.projects.index');
    }

    public function projectShow($id) {
        $projects = \App\Project::orderBy('updated_at', 'asc')->get();
        return view('pages.sv.projects.show', compact('id', 'projects'));
    }

    public function projectStore(Request $request) {
        $opcode = $request->opcode;
        if($opcode == 1) {
            $data = array(
                'name'  =>  $request->name,
                'address'   =>  $request->address,
            );

            $validator = \Validator::make($data, [
                'name'  =>  'required|string',
                'address'   =>  'required|string'
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $data = array(
                'fname' =>  $data['name'],
                'lname' =>  'NILL',
                'oname' =>  'NILL',
                'occupations_id'    =>  0,
                'dob'           =>  date('Y-m-d'),
                'gender'        =>  1,
                'wives_total'   =>  0,
                'children_total'    =>  0,
                'tribe' =>  'NILL',
                'household_head'    =>  'NILL',
                'household_head_photo'  =>  'NILL',
                'phone'  =>  'NILL',
                'email'  =>  'NILL',
                'street'    =>  $data['address'],
                'lgas_id'   =>  0,
                'city'  =>  'NILL',
                'states_id' =>  0,
                'household_size'    =>  '1 - 2',
                'created_by'    =>  \Auth::id(),
            );

            // $ben = \Auth::user()->svben()->create($data);
            $ben = \App\Beneficiary::firstOrCreate($data);

            session(['ben' => $ben->id]);

            return response()->json($ben);
        } else if($opcode == 2) {
            $data = array(
                'roof'  =>  $request->roof,
                'ceiling'   =>  $request->ceiling,
                'wall'  =>  $request->wall,
                'window'    =>  $request->window,
                'door'  =>  $request->door,
                'fence' =>  $request->fence,
                'state_of_repairs'  =>  $request->state_of_repairs,
                'accomodation'  =>  $request->accomodation,
                'size_of_plot'  =>  $request->size_of_plot,
                'building_area'  =>  $request->building_area,
            );

            $validator = \Validator::make($data, [
                'roof'  =>  'nullable|string',
                'ceiling'   =>  'nullable|string',
                'wall'  =>  'nullable|string',
                'window'    =>  'nullable|string',
                'door'  =>  'nullable|string',
                'fence' =>  'nullable|string',
                'state_of_repairs'  =>  'nullable|string',
                'accomodation'  =>  'nullable|string',
                'size_of_plot'  =>  'required|string',
                'building_area' =>  'required|string'
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $bid = $request->session()->pull('ben', 0);
            if($bid == 0) {
                return response()->json("404");
            }
            $ben = \App\SVBen::find($bid);

            if($request->hasFile('file')) {
                return response()->json('404F');
            }
            $proof = $request->file->store('public/beneficiaries/avatars');
            $data['proof_document'] = $proof;
            $props = $ben->props()->create($data);
            return response()->json($props);
        }
    }

    public function getTotalValuation($project_id) {
        $total_valuation = 0;
        $beneficiaries;
        if($project_id == "all") {
            $beneficiaries = \App\Beneficiary::all();
            $beneficiaries = collect($beneficiaries)->pluck('id');
        } else {
            $beneficiaries = \App\ProjectBeneficiary::where('project_id', $project_id)->get();
            $beneficiaries = collect($beneficiaries)->pluck('beneficiary_id');
        }

        $beneficiaries = $beneficiaries->toArray();

        foreach($beneficiaries as $b) {
            $property       = \App\Property::where('beneficiaries_id', $b)->where('type', 1)->first();
            if(count($property) > 0) {
                $properties   = \App\PropertyStructure::where('properties_id', $property->id)->get();
                if(count($properties) > 0) {
                    foreach($properties as $c) {
                        $total_valuation += $c->total_valuation;
                    }
                }
            }
        }
        return $total_valuation;
    }

    public function getBeneficiaryStructureTotal($bid) {
        $total_structures = 0;
        $property       = \App\Property::where('beneficiaries_id', $bid)->where('type', 1)->first();
        if(count($property) > 0) {
            $properties   = \App\PropertyStructure::where('properties_id', $property->id)->get();
            if(count($properties) > 0) {
                foreach($properties as $c) {
                    $total_structures += 1;
                }
            }
        }
        return $total_structures;
    }

    public function getBeneficiaryStructureValuation($bid) {
        $total_amount = 0;
        $property       = \App\Property::where('beneficiaries_id', $bid)->where('type', 1)->first();
        if(count($property) > 0) {
            $properties   = \App\PropertyStructure::where('properties_id', $property->id)->get();
            if(count($properties) > 0) {
                foreach($properties as $c) {
                    $total_amount += $c->total_valuation;
                }
            }
        }
        return $total_amount;
    }

    public function valuations() {
        $projects = \App\Project::paginate(15);
        $beneficiaries = \App\Beneficiary::paginate(15);
        $total_projects = \App\Project::count();
        $total_beneficiaries = \App\Beneficiary::count();
        $total_valuation = $this->getTotalValuation('all');

        $beneficiaries = \App\Beneficiary::paginate(15);
        // total valuation will be for all beneficiaries
        $total_valuation = $this->getTotalValuation("all");
        foreach($beneficiaries as $b) {
            $b->total_structures = $this->getBeneficiaryStructureTotal($b->id);
            $b->total_amount = $this->getBeneficiaryStructureValuation($b->id);
        }

        // get number of beneficiaries in a project.
        foreach($projects as $p) {
             $p->beneficiaries = \App\ProjectBeneficiary::where('project_id', $p->id)->count();
        }

        return view('pages.valuations.structures.valuations', compact('projects', 'beneficiaries', 'total_projects', 'total_beneficiaries', 'total_valuation'));
    }

    public function downloadStructureReport($project_id) {
        return \Excel::download(new \App\Exports\StructureValuationGeneral($project_id), 'structures-valuation-general.xlsx');
    }
}
