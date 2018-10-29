<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StructureValuationGeneral implements FromView
{
    public $project_id;

    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    public function view(): View
    {
        $project_id = 0;
        $beneficiaries = []; $project;
        $total_valuation = 0;
        $projects       = \App\Project::all();

        if($this->project_id == "all" || $this->project_id <= 0) {
            $beneficiaries = \App\Beneficiary::all();
            // total valuation will be for all beneficiaries
            $total_valuation = $this->getTotalValuation("all");
        } else {
            $project = \App\Project::find($this->project_id);
            $beneficiaries = \DB::table('project_beneficiaries')
                                ->join('beneficiaries', 'project_beneficiaries.beneficiary_id', '=', 'beneficiaries.id')
                                ->where('project_beneficiaries.project_id', $this->project_id)
                                ->get();
            //total valuation will be for beneficiaries in the selected project.
            $total_valuation = $this->getTotalValuation($this->project_id);
        }

        foreach($beneficiaries as $b) {
            $b->total_structures = $this->getBeneficiaryStructureTotal($b->id);
            $b->total_amount = $this->getBeneficiaryStructureValuation($b->id);
        }
        return view('pages.valuations.structures.export-index', compact('beneficiaries', 'projects', 'project_id', 'project', 'total_valuation'));
    }


    public function getTotalValuation($project_id)
    {
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

    public function getBeneficiaryStructureTotal($bid)
    {
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

    public function getBeneficiaryStructureValuation($bid)
    {
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
}