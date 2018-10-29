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
        if($bid == 0) {
            $bid = session('current_ben');
        }
        $ben = \App\Beneficiary::find($bid);

        if(!$ben) {
            return response()->json("404");
        }

        return response()->json($ben->dependents);
    }

    public function saveDependents(Request $request) {
        $data = array(
            'beneficiaries_id'  =>  $request->b,
            'name'              =>  $request->n,
            'gender'            =>  $request->g,
            'dob'               =>  $request->d,
            'occupation'        =>  $request->o,
            'remarks'           =>  $request->r,
            'married'           =>  $request->m,
        );

        $validator = \Validator::make($data, [
            'name'              =>  'required|string',
            'gender'            =>  'required',
            'dob'               =>  'required|date_format:Y-m-d',
            'occupation'        =>  'nullable|string',
            'remarks'           =>  'nullable|string'
        ]);

        if($validator->fails()) {
            return $validator->errors();
        }

        $ben = \App\Beneficiary::find($data['beneficiaries_id']);

        if(!$ben) {
            return response()->json("404");
        }

        // $d = $ben->dependents()->create($data);
        $d = \App\BeneficiaryDependent::create($data);

        return response()->json($d);
    }

    public function getProjectData($month) {
        return count(\App\Project::where('created_at', 'LIKE', '%' . $month . '%')->get());
    }

    public function getBeneficiaryData($month) {
        return count(\App\Beneficiary::where('created_at', 'LIKE', '%' . $month . '%')->get());
    }

    public function getProjectStatsData($period) {
        $projectData = [];
        $beneficiaryData = [];
        $data = [];
        for($i = 1; $i <= $period; $i++) {
            $j = "";
            if($i < 10) {
                $j = "0" . $i;
            }
            $month = "2018-" . $j;
            array_push($projectData, $this->getProjectData($month));
            array_push($beneficiaryData, $this->getBeneficiaryData($month));
        }
        $data[0] = $projectData;
        $data[1] = $beneficiaryData;

        return response()->json($data);
    }

    public function getCrops() {
        return \App\CropGrade::all();
    }

    public function getCropsID() {
        return collect($this->getCrops())->pluck('id');
    }

    public function getCropsName() {
        return collect($this->getCrops())->pluck('crop');
    }

    public function getCropGrade() {
        return collect($this->getCrops())->pluck('grade');
    }

    public function getDistinctCropName() {
        $crops = \App\CropGrade::distinct()->get(['crop']);
        return collect($crops)->pluck('crop');
    }

    public function getCropsList() {
        $cropsList = [];
        $ids    = $this->getCropsID();
        $names  = $this->getCropsName();
        $grades = $this->getCropGrade();

        for($i = 0; $i < count($ids); $i++) {
            $cropsList[$ids[$i]] = $names[$i];
        }

        return $cropsList;
    }
}
