<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function getOccupation() {
        return response()->json(\App\Occupation::all());
    }

    public function setOccupation(Request $request) {
        $data = array(
            'title'    =>  $request->occupation,
        );

        $validator = \Validator::make($data, [
            'title'    =>  'required|unique:occupations|string'
        ], [
            'title'     =>  'Please check the occupation and try again'
        ]);

        if($validator->fails()) {
            return $validator->errors();
        }

        $add = \App\Occupation::create($data);

        return response()->json("success");
    }

    public function getStates() {
        return response()->json(\App\State::all());
    }

    public function getLga($sid) {
        return response()->json(\App\Lga::where('state_id', $sid)->get());
    }

    public function getDependents($bid) {
        $ben = \App\Beneficiary::find($bid);

        if(!$ben) {
            return response()->json("404");
        }

        return response()->json($ben->dependents);
    }

    public function saveDependents(Request $request) {
        $data = array(
            'beneficiaries_id'  =>  $request->i,
            'name'              =>  $request->n,
            'gender'            =>  $request->g,
            'age'               =>  $request->a
        );

        $validator = \Validator::make($data, [
            'beneficiaries_id'  =>  'required|integer',
            'name'              =>  'required|string',
            'gender'            =>  'required',
            'age'               =>  'required|integer'
        ]);

        if($validator->fails()) {
            return $validator->errors();
        }

        $ben = \App\Beneficiary::find($data['beneficiaries_id']);

        if(!$ben) {
            return response()->json("404");
        }

        $d = $ben->dependents()->create($data);

        return response()->json($d);
    }
}
