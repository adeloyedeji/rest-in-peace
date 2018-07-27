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
    public function index()
    {

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
        return view('pages.sv.projects.show', [
            'id'    =>  $id
        ]);
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
}
