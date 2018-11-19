<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FCDAStructureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function capture(Request $request, $id, $ppid, $sid)
    {
        $ben                = \App\FCDABeneficiary::find($id);
        $property           = \App\FCDABenProp::find($ppid);
        $structure_profile  = \App\FCDAStructureBeneficiary::find($sid);
        
        if(count($ben) > 0)
        {
            if(count($property) > 0)
            {
                $project            = \App\Project::find($property->project_id);
                $structure          = \App\FCDAStructureBeneficiaryProperty::where('f_c_d_a_ben_prop_id', $property->id)->first();
                return view('pages.structures.capture', compact('ben', 'property', 'structure_profile', 'project', 'structure'));
            }
            else
            {
                \Session::flash('warning', 'Please add at least one property to continue.');
                return redirect()->back();
            }
        }
        abort(404);
    }

    public function captureAnotherProperty(Request $request, $ben_id, $pr_id, $prop_id)
    {
        $ben                = \App\FCDABeneficiary::find($ben_id);
        $project            = \App\Project::find($pr_id);
        $property           = \App\FCDABenProp::find($prop_id);
        // $structure_profile  = \App\FCDAStructureBeneficiary::where('f_c_d_a_beneficiary_id', $ben->id)->first();
        $structure_profile  = \App\FCDAStructureBeneficiary::where('code', $property->f_c_d_a_structure_beneficiary_code)->first();
        $structure          = [];

        if(!$property->exists())
        {
            \Session::flash('error', 'Error occured!');
            // abort(404);
            return redirect()->back();
        }
        else
        {
            if($structure_profile && $structure_profile->exists())
            {
                // $structure = \App\FCDAStructureBeneficiary::where('code', $property->f_c_d_a_structure_beneficiary_code)->first();
                $structure = \App\FCDAStructureBeneficiaryProperty::where('f_c_d_a_ben_prop_id', $structure_profile->id)->first();
            }
            return view('pages.structures.capture-more', compact('ben', 'project', 'structure', 'structure_profile', 'property'));
        }

    }

    public function store(Request $request)
    {
        $prop_data = array(
            'current_interest'                      => $request->current_interest,
            'interest_address'                      => $request->interest_address,
            'interest'                              => $request->interest,
            'date_of_inspection'                    => $request->year . '-' . $request->month . '-' . $request->day,
            'title'                                 => $request->title,
        );

        $structure_data = array(
            'size_of_plots'                         => $request->size_of_plots,
            'building_plan'                         => $request->building_plan,
            'type_of_development'                   => $request->type_of_development,
            'roof'                                  => $request->roof,
            'ceiling'                               => $request->ceiling,
            'wall'                                  => $request->wall,
            'window'                                => $request->window,
            'door'                                  => $request->door,
            'floor'                                 => $request->floor,
            'fence'                                 => $request->fence,
            'state_of_repairs'                      => $request->state_of_repairs,
            'accomodation'                          => $request->accomodation,
        );

        $ben = \App\FCDABeneficiary::find($request->ben);

        if(count($ben) <= 0)
        {
            return response()->json("b404");
        }
        else
        {
            $ben_property = \App\FCDABenProp::find($request->property);
    
            if($ben_property)
            {
                $ben_property->update($prop_data);
            }
            else
            {
                return response()->json("pp404");
            }

            $structure_data['f_c_d_a_ben_prop_id'] = $ben_property->id;
            $structure = \App\FCDAStructureBeneficiaryProperty::create($structure_data);
            $resp = array(
                'status'    => 'ok',
                'id'        => $structure->id
            );
            return response()->json($resp);
        }
    }

    public function storeSub(Request $request)
    {
        $parent = \App\FCDAStructureBeneficiaryProperty::find($request->pid);
        if(!$parent)
        {
            if($request->ajax())
            {
                return response()->json(404);
            }
            else
            {
                \Session::flash('error', 'Please add property details before capturing sub properties.');
                return redirect()->back()->withInput();
            }
        }

        $data = array(
            'roof'      => $request->roof,
            'ceiling'   => $request->ceiling,
            'wall'      => $request->wall,
            'window'    => $request->window,
            'door'      => $request->door,
            'floor'     => $request->floor,
        );

        $parent->subProperty()->create($data);

        if($request->ajax())
        {
            return response()->json("ok");
        }
        else
        {
            \Session::flash('success', 'Sub property successfully captured.');
            return redirect()->back();
        }
    }

    public function finalizeProperty(Request $request)
    {
        $property = \App\FCDAStructureBEneficiaryProperty::find($request->pid);

        if(!$property)
        {
            if($request->ajax())
            {
                return response()->json(404);
            }
            else
            {
                \Session::flash('error', 'Please add property details before capturing sub properties.');
                redirect()->back()->withInput();
            }
        }
        $data = array(
            'external_works'    => $request->external_works,
            'services'          => $request->services,
            'electricity'       => $request->electricity,
            'water'             => $request->water,
            'valuation_data'    => $request->valuation_data,
            'valuation'         => $request->valuation,
            'compensation'      => $request->compensation
        );

        $validator = \Validator::make($data, [
            'valuation'     => 'required|numeric',
            'compensation'  => 'required|numeric'
        ]);

        if($validator->fails())
        {
            if($request->ajax())
            {
                return response()->json($validator->errors());
            }
            else
            {
                \Session::flash('warning', 'Please add property details before finalizing property.');
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
        }

        if(!$data['external_works'] && !$data['services'] && !$data['electricity'] && !$data['water'] && !$data['valuation_data'])
        {
            if($request->ajax())
            {
                return response()->json("You need to fill at least one field to continue.");
            }
            else
            {
                \Session::flash('warning', 'You need to fill at least one field to continue.');
                return redirect()->back();
            }
        }

        $property->update($data);

        if($request->ajax())
        {
            return response()->json("ok");
        }
        else
        {
            return redirect()->route();
        }
    }

    public function preAddMore(Request $request)
    {
        $property_data = array(
            'f_c_d_a_structure_beneficiary_code'    => $request->property_code,
            'project_id'                            => $request->project,
            'current_interest'                      => $request->current_interest,
            'interest_address'                      => $request->interest_address,
            'interest'                              => $request->interest,
            'date_of_inspection'                    => $request->year . '-' . $request->month . '-' . $request->day,
            'title'                                 => $request->title,
        );

        $property_validator = \Validator::make($property_data, [
            'f_c_d_a_structure_beneficiary_code'    => 'required|string|unique:f_c_d_a_ben_props',
            'project_id'                            => 'required|integer',
            'date_of_inspection'                    => 'required|date_format:Y-m-d',
            'title'                                 => 'required|string',
        ]);

        if($property_validator->fails())
        {
            if($request->ajax())
            {
                return response()->json($property_validator->errors());
            }
            else
            {
                return redirect()->back()->withErrors($property_validator->errors());
            }
        }

        $ben_prop = \App\FCDABenProp::create($property_data);

        if($request->ajax())
        {
            $resp = array(
                'status'    => 'ok',
                'id'        => $ben_prop->id
            );
            return response()->json($resp);
        }
        else
        {
            return redirect()->route('beneficiaries.properties.structure.add', ['bid' => $request->ben_id, 'project_id' => $property_data['project_id'], 'prop_id' => $ben_prop->id]);
        }
    }

    public function storeAnotherProperty(Request $request)
    {
        $ben = \App\FCDABeneficiary::find($request->ben_id);
        if(!$ben)
        {
            abort(404);
        }

        $structure_profile_data = array(
            'f_c_d_a_beneficiary_id'    => $ben->id,
            'code'                      => $request->property_code,
            'village'                   => $request->village,
            'address'                   => $request->address,
            'location'                  => $request->location,
        );

        $structure_profile_validator = \Validator::make($structure_profile_data, [
            'f_c_d_a_beneficiary_id'    => 'required|integer',
            'code'                      => 'required|string',
            'village'                   => 'required|string',
            'address'                   => 'required|string',
            'location'                  => 'required|string',
        ]);

        if($structure_profile_validator->fails())
        {
            if($request->ajax())
            {
                return response()->json($structure_profile_validator->errors());
            }
            else
            {
                \Session::flash('warning', 'Please attend to the following validation errors and try again.');
                return redirect()->back()->withErrors($structure_profile_validator->errors())->withInput();
            }
        }

        $structure_profile = \App\FCDAStructureBeneficiary::create($structure_profile_data);
        $structure_property_data = array(
            'f_c_d_a_ben_prop_id'   =>  $request->prop_id,
            'size_of_plots'         =>  $request->size_of_plots,
            'building_plan'         =>  $request->building_plan,
            'type_of_development'   =>  $request->type_of_development,
            'roof'                  =>  $request->roof,
            'ceiling'               =>  $request->ceiling,
            'wall'                  =>  $request->wall,
            'window'                =>  $request->window,
            'door'                  =>  $request->door,
            'floor'                 =>  $request->floor,
            'fence'                 =>  $request->fence,
            'state_of_repairs'      =>  $request->state_of_repairs,
            'accomodation'          =>  $request->accomodation,
        );
        $structure_property = \App\FCDAStructureBeneficiaryProperty::create($structure_property_data);
        
        if($request->ajax())
        {
            $resp = array(
                'status'    => 'ok',
                'id'        => $structure_property->id
            );
     
            return response()->json($resp);
        }
        else
        {
            \Session::flash('success', 'Property captured successfully.');
            return redirect()->back();
        }
    }
}
