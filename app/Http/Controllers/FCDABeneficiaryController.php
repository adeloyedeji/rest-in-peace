<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FCDABeneficiaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function structureBeneficiaryStore(Request $request)
    {
        if($request->hasFile('file'))
        {
            $validator = \Validator::make($request->all(), [
                'project'   =>  'required|integer',
                'code'      =>  'required|string|unique:f_c_d_a_structure_beneficiaries',
                'name'      =>  'required|string',
                'village'   =>  'required|string',
                'address'   =>  'required|string',
                'location'  =>  'nullable|string',
                'gender'    =>  'required'
            ]);
            
            if($validator->fails())
            {
                return response()->json($validator->errors());
            }

            $beneficiaryData = array(
                'name'      => $request->name,
                'gender'    => $request->gender,
                'photo'     => $request->file('file')->store('public/beneficiaries/avatars'),
                'type'      => 1
            );

            $ben = \App\FCDABeneficiary::create($beneficiaryData);

            // also save the project the beneficiary was added to.
            // $project = \App\ProjectBeneficiary::create([
            //     'project_id'        => $request->project,
            //     'beneficiary_id'    => $ben->id
            // ]);
            $property_data = array(
                'f_c_d_a_structure_beneficiary_code'    => $request->code, 
                'project_id'                            => $request->project,
            );
            $property = \App\FCDABenProp::create($property_data);

            $structure_profile = \App\FCDAStructureBeneficiary::create([
                'f_c_d_a_beneficiary_id'    => $ben->id,
                'code'                      => $request->code,
                'village'                   => $request->village,
                'address'                   => $request->address,
                'location'                  => $request->location
            ]);

            $resp = array(
                'bid'    => $ben->id,
                'ppid'   => $property->id,
                'sid'    => $structure_profile->id
            );
            return response()->json($resp);
        }
        else
        {
            return response()->json("no-image");
        }
    }

    public function beneficiaries(Request $Request, $id, $property_id, $sid)
    {
        $ben = \App\FCDABeneficiary::find($id);
        if(count($ben) > 0)
        {
            $property   = \App\FCDABenProp::find($property_id);
            $project    = \App\Project::find($property->project_id);
            $structure  = \App\FCDAStructureBeneficiaryProperty::where('f_c_d_a_ben_prop_id', $property_id)->first();
            $structure_p = \App\FCDAStructureBeneficiary::where('f_c_d_a_beneficiary_id', $ben->id)->first();
            $ps         = \App\ProjectBeneficiary::where('beneficiary_id', $id)->get();
            return view('pages.structures.beneficiary', compact('ben', 'project', 'property', 'structure', 'structure_p'));
        }
        abort(404);
    }
}
