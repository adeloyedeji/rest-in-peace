<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropTreeValuationController extends Controller
{
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
            $b->total_crops = $this->getBeneficiaryCropsTotal($b->id);
            $b->total_amount = $this->getBeneficiaryCropsValuation($b->id);
        }
        return view('pages.valuations.crops.index', compact('beneficiaries', 'projects', 'project_id', 'project', 'total_valuation'));
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
            $b->total_crops = $this->getBeneficiaryCropsTotal($b->id);
            $b->total_amount = $this->getBeneficiaryCropsValuation($b->id);
        }

        foreach($projects as $p) {
             $p->beneficiaries = \App\ProjectBeneficiary::where('project_id', $p->id)->count();
        }

        return view('pages.valuations.crops.valuations', compact('projects', 'beneficiaries', 'total_projects', 'total_beneficiaries', 'total_valuation'));
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
            $cropProperty       = \App\Property::where('beneficiaries_id', $b)->where('type', 2)->first();
            if(count($cropProperty) > 0) {
                $crops      = \App\CropPropertyData::where('beneficiary_id', $b)->get();
                if(count($crops) > 0) {
                    foreach($crops as $c) {
                        $total_valuation += $c->valuation;
                    }
                }
            }
        }
        return $total_valuation;
    }

    public function getBeneficiaryCropsTotal($bid) {
        $total_crop = 0;
        $cropProperty       = \App\Property::where('beneficiaries_id', $bid)->where('type', 2)->first();
        if(count($cropProperty) > 0) {
            $crops      = \App\CropPropertyData::where('beneficiary_id', $bid)->get();
            if(count($crops) > 0) {
                foreach($crops as $c) {
                    $total_crop += 1;
                }
            }
        }
        return $total_crop;
    }

    public function getBeneficiaryCropsValuation($bid) {
        $total_amount = 0;
        $cropProperty       = \App\Property::where('beneficiaries_id', $bid)->where('type', 2)->first();
        if(count($cropProperty) > 0) {
            $crops      = \App\CropPropertyData::where('beneficiary_id', $bid)->get();
            if(count($crops) > 0) {
                foreach($crops as $c) {
                    $total_amount += $c->valuation;
                }
            }
        }
        return $total_amount;
    }

    public function downloadCropReport($project_id) {
        return \Excel::download(new \App\Exports\CropsTreeValuationGeneral($project_id), 'crops-trees-valuation-general.xlsx');
    }
}
