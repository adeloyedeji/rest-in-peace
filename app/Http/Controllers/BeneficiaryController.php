<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiaryController extends Controller
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
        // dd(\App\Beneficiary::find(1));
        $beneficiaries = \App\Beneficiary::orderBy('created_at', 'desc')->paginate(20);
        return view('pages.beneficiaries.index', [
            'beneficiaries' =>  $beneficiaries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupations = \App\Occupation::all();
        $states = \App\State::all();
        $projects = \App\Project::all();
        return view('pages.beneficiaries.create', [
            'occupations'   =>  $occupations,
            'states'        =>  $states,
            'projects'      =>  $projects,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $op = $request->op;
        if($op == 1) {
            $data = array(
                'fname' =>  $request->f,
                'lname' =>  $request->l,
                'oname' =>  $request->o,
                'occupations_id'    =>  $request->oc,
                'dob'           =>  $request->y . "-" . $request->m . "-" . $request->d,
                'gender'        =>  $request->g,
                'wives_total'   =>  $request->w,
                'children_total'    =>  $request->c,
                'tribe' =>  'pending',
                'household_head'    =>  'pending',
                'household_head_photo'  =>  'pending',
                'phone'  =>  'pending',
                'email'  =>  'pending',
                'street'    =>  'pending',
                'lgas_id'   =>  0,
                'city'  =>  'pending',
                'states_id' =>  0,
                'household_size'    =>  '1 - 2',
                'created_by'    =>  \Auth::id(),
            );

            $validator = \Validator::make($data, [
                'fname' =>  'required|string',
                'lname' =>  'required|string',
                'oname' =>  'nullable|string',
                'occupations_id'    =>  'required|integer',
                'dob'   =>  'required',
                'gender'    =>  'required',
                'wives_total'   =>  'required|integer',
                'children_total'    =>  'required|integer',
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $beneficiary = \App\Beneficiary::firstOrCreate($data);

            return response()->json($beneficiary->id);
        } else if($op == 2) {
            $data = array(
                'tribe' =>  $request->t,
                'household_head'    =>  $request->hh,
                'household_size'    =>  $request->hs,
            );

            $validator = \Validator::make($data, [
                'tribe' =>  'required|string',
                'household_head'    =>  'required|string',
                'household_size'    =>  'required',
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $i = $request->ben;
            $up = \App\Beneficiary::find($i);

            if(!$up) {
                return response()->json("404");
            }

            if($request->hasFile('file')) {

                // $imageValidator = \Validator::make($request, [
                //     // 'file'      =>  'image|dimensions:max_width=200,max_height=200'
                //     'file'      =>  'image'
                // ]);

                // if($imageValidator->fails()) {
                //     return $imageValidator->errors();
                // }

                $avatar = $request->file->store('public/beneficiaries/avatars');
            }

            $data['household_head_photo'] = $avatar;

            $update = $up->update($data);

            return response()->json($update);
        } else if($op == 3) {
            $data = array(
                'phone' =>  $request->p,
                'email' =>  $request->e,
                'street'    =>  $request->st,
                'lgas_id'   =>  $request->l,
                'city'  =>  $request->c,
                'states_id' =>  $request->sid,
            );

            $validator = \Validator::make($data, [
                'phone' =>  'required|min:11',
                'email' =>  'nullable',
                'street'    =>  'required',
                'lgas_id'   =>  'required',
                'city'  =>  'required|string',
                'states_id' => 'required|integer',
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $up = \App\Beneficiary::find($request->ben);

            if(!$up) {
                return response()->json("404");
            }

            $update = $up->update($data);

            return response()->json($update);
        } else if($op == 4) {
            $data = array(
                'project_id'    =>  $request->p,
                'beneficiary_id'    =>  $request->ben
            );

            if(!\App\Project::find($data['project_id'])) {
                return response()->json("404");
            }
            if(!\App\Beneficiary::find($data['beneficiary_id'])) {
                return response()->json("404");
            }

            $add = \App\ProjectBeneficiary::create($data);

            return response()->json(1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ben = \App\Beneficiary::find($id);

        if(!$ben) {
            abort("404");
        }

        return view('pages.beneficiaries.show', [
            'beneficiary'   =>  $ben
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
}
