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
        return view('pages.beneficiaries.create', [
            'occupations'   =>  $occupations,
            'states'        =>  $states
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
                'fname' =>  $request->fname,
                'lname' =>  $request->lname,
                'oname' =>  $request->oname,
                'occupations_id'    =>  $request->oc,
                'dob'           =>  $request->d . "-" . $request->m . "-" . $request->d,
                'gender'        =>  $request->g,
                'wives_total'   =>  $request->w,
                'children_total'    =>  $request->c,
                'tribe' =>  'pending',
                'household_head'    =>  'pending',
                'household_head_photo'  =>  'pending',
                'street'    =>  'pending',
                'lgas_id'   =>  0,
                'city'  =>  'pending',
                'states_id' =>  0,
                'household_size'    =>  0,
                'created_by'    =>  \Auth::id(),
            );

            $validator = \Validator::make($data, [
                'fname' =>  'required|string',
                'lname' =>  'required|string',
                'oname' =>  'required|string',
                'occupations_id'    =>  'required|integer',
                'dob'   =>  'required|date_format:Y-m-d',
                'gender'    =>  'required',
                'wives_total'   =>  'required|integer',
                'children_total'    =>  'required|integer',
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $beneficiary = \App\Beneficiary::firstOrCreate($data);

            return response()->json($beneficiary);
        } else if($op == 2) {
            $data = array(
                'tribe' =>  $request->t,
                'household_head'    =>  $request->hh,
                'household_size'    =>  $request->hs,
            );

            $validator = \Validator::make($request, [
                'tribe' =>  'required|string',
                'household_head'    =>  'required|string',
                'household_size'    =>  'required|integer',
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }

            $up = \App\Beneficiary::find($request->ben);

            if(!$up) {
                return response()->json("404");
            }

            if($request->hasFile('photo')) {
                
            }

            $up->update($data);

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
}
