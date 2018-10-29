<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CropsTreeValuationGeneral implements FromView
{
    public $project_id;

    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    public function view(): View
    {
        $temp = 0; $project_id = 0;
        $beneficiaries = []; $project;
        $total_valuation = 0;
        $projects       = \App\Project::all();
        $project_id     = $this->project_id;
        if($this->project_id == "all" || $this->project_id <= 0) {
            $beneficiaries = \App\Beneficiary::get();
            $total_valuation = $this->getTotalValuation("all");
        } else {
            $project = \App\Project::find($this->project_id);
            $beneficiaries = \DB::table('project_beneficiaries')
                                ->join('beneficiaries', 'project_beneficiaries.beneficiary_id', '=', 'beneficiaries.id')
                                ->where('project_beneficiaries.project_id', $project_id)
                                ->paginate(15);
            $total_valuation = $this->getTotalValuation($this->project_id);
        }

        foreach($beneficiaries as $b) {
            $b->total_crops = $this->getBeneficiaryCropsTotal($b->id);
            $b->total_amount = $this->getBeneficiaryCropsValuation($b->id);
        }
        return view('pages.valuations.crops.export-index', compact('beneficiaries', 'projects', 'project_id', 'project', 'total_valuation'));
    }


    public function getTotalValuation($project_id)
    {
        $total_valuation = 0;
        $total_crop = 0;
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
                        $total_crop += 1;
                    }
                }
            }
        }
        return $total_valuation;
    }

    public function getBeneficiaryCropsTotal($bid)
    {
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

    public function getBeneficiaryCropsValuation($bid)
    {
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
}