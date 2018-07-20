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
}
