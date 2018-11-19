<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FCDAPlanningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $beneficiaries = [];
        if($request->query('search'))
        {
            $bens = \App\FCDAPlanningBen::where('code', 'LIKE', '%' . $request->query('search') . '%')->latest()->get();
            if($bens)
            {
                foreach($bens as $b)
                {
                    $beneficiaries[] = \App\FCDABeneficiary::find($b->f_c_d_a_beneficiary_id);
                }
            }
        }
        else
        {
            $beneficiaries = \App\FCDABeneficiary::where('type', 2)->latest()->paginate(20);
        }
        return view('pages.planning.beneficiaries', compact('beneficiaries'));
    }

    public function store(Request $request)
    {
        $ben_data = array(
            'name'      => $request->household_head,
            'gender'    => $request->gender,
            'photo'     => $request->file('file')->store('public/beneficiaries/avatars'),
            'type'      => 2
        );

        $ben_validator = \Validator::make($ben_data, [
            'name'      => 'required|string|max:191',
            'gender'    => 'required|integer',
        ]);

        if($ben_validator->fails())
        {
            return response()->json($ben_validator->errors());
        }

        $planning_ben_data = array(
            'project_id'                => $request->project,
            'code'                      => $request->code,
            'village'                   => $request->village,
            'address'                   => $request->address,
            'city'                      => $request->city,
            'household_head'            => $request->household_head,
            'sub_household_head'        => $request->sub_household_head,
            'date_of_birth'             => $request->year . '-' . $request->month . '-' . $request->day,
            'gender'                    => $request->gender,
            'wives'                     => $request->wives,
            'children'                  => $request->child_total,
            'occupation'                => $request->occupation,
            'state_of_origin'           => $request->state_of_origin,
            'tribe'                     => $request->tribe,
            'indigene'                  => $request->indigene,
            'duration'                  => $request->resident_duration,
            'household_size'            => $request->household_size,
            'property_type'             => $request->property_type,
            'accomodation_type'         => $request->accomodation_type,
            'ownership_type'            => $request->ownership_type,
            'plan_approval'             => $request->plan_approval,
        );

        $planning_ben_validator = \Validator::make($planning_ben_data, [
            'project_id'    => 'required|numeric',
            'code'  => 'required|string|unique:f_c_d_a_planning_bens',
            'village'   => 'required|string',
            'address'   => 'required|string',
            'city'  => 'required|string',
            'household_head'    => 'required|string',
            'sub_household_head'    => 'required|string',
            'date_of_birth' => 'required',
            'gender'    => 'required|numeric',
            'wives' => 'required|numeric',
            'children'  => 'required|numeric',
            'occupation'    => 'required|string',
            'state_of_origin'   => 'required|numeric',
            'tribe' => 'required|string',
            'indigene'  => 'required|numeric',
            'duration'  => 'required|numeric',
            'household_size'    => 'required|string',
            'property_type' => 'required|string',
            'accomodation_type' => 'required|string',
            'ownership_type'    => 'required|string',
            'plan_approval' => 'required|numeric',
        ]);

        if($planning_ben_validator->fails())
        {
            \Session::flash('error', 'Please attend to the validation errors and try again.');
            return response()->json($planning_ben_validator->errors());
        }

        $ben = \App\FCDABeneficiary::create($ben_data);

        $planning_ben_data['f_c_d_a_beneficiary_id'] = $ben->id;

        $planning_ben = \App\FCDAPlanningBen::create($planning_ben_data);
        \Session::flash('success', 'Beneficiary successfully captured.');
        $resp = array(
            'status'    => 'ok',
            'bid'       => $ben->id,
            'pid'       => $planning_ben_data['project_id']
        );
        return response()->json($resp);
    }

    public function show(Request $request, $bid, $pid)
    {
        $ben = \App\FCDABeneficiary::find($bid);
        if(!$ben)
        {
            \Session::flash('warning', 'Beneficiary does not exist!');
            return redirect()->back();
        }
        $planning_profile = \App\FCDAPlanningBen::find($pid);

        if(!$planning_profile)
        {
            \Session::flash('warning', 'Planning profile not found!');
            return redirect()->back();
        }

        $project = \App\Project::find($planning_profile->project_id);

        return view('pages.planning.beneficiary', compact('ben', 'project', 'planning_profile'));
    }

    public function update(Request $request)
    {
        $ben_data = array(
            'name'      => $request->household_head,
            'gender'    => $request->gender,
            'type'      => 2
        );
        
        $ben_validator = \Validator::make($ben_data, [
            'name'      => 'required|string|max:191',
            'gender'    => 'required|integer',
        ]);
        if($request->hasFile('photo'))
        {
            $ben_data['photo'] = $request->file('file')->store('public/beneficiaries/avatars');
        }

        if($ben_validator->fails())
        {
            return response()->json($ben_validator->errors());
        }

        $planning_ben_data = array(
            'project_id'                => $request->project,
            'code'                      => $request->code,
            'village'                   => $request->village,
            'address'                   => $request->address,
            'city'                      => $request->city,
            'household_head'            => $request->household_head,
            'sub_household_head'        => $request->sub_household_head,
            'date_of_birth'             => $request->year . '-' . $request->month . '-' . $request->day,
            'gender'                    => $request->gender,
            'wives'                     => $request->wives,
            'children'                  => $request->child_total,
            'occupation'                => $request->occupation,
            'state_of_origin'           => $request->state_of_origin,
            'tribe'                     => $request->tribe,
            'indigene'                  => $request->indigene,
            'duration'                  => $request->resident_duration,
            'household_size'            => $request->household_size,
            'property_type'             => $request->property_type,
            'accomodation_type'         => $request->accomodation_type,
            'ownership_type'            => $request->ownership_type,
            'plan_approval'             => $request->plan_approval,
        );

        $planning_ben_validator = \Validator::make($planning_ben_data, [
            'project_id'    => 'required|numeric',
            'code'  => 'required|string|unique:f_c_d_a_planning_bens',
            'village'   => 'required|string',
            'address'   => 'required|string',
            'city'  => 'required|string',
            'household_head'    => 'required|string',
            'sub_household_head'    => 'required|string',
            'date_of_birth' => 'required',
            'gender'    => 'required|numeric',
            'wives' => 'required|numeric',
            'children'  => 'required|numeric',
            'occupation'    => 'required|string',
            'state_of_origin'   => 'required|numeric',
            'tribe' => 'required|string',
            'indigene'  => 'required|numeric',
            'duration'  => 'required|numeric',
            'household_size'    => 'required|string',
            'property_type' => 'required|string',
            'accomodation_type' => 'required|string',
            'ownership_type'    => 'required|string',
            'plan_approval' => 'required|numeric',
        ]);

        if($planning_ben_validator->fails())
        {
            \Session::flash('error', 'Please attend to the validation errors and try again.');
            return response()->json($planning_ben_validator->errors());
        }

        $ben = \App\FCDABeneficiary::create($ben_data);

        $planning_ben_data['f_c_d_a_beneficiary_id'] = $ben->id;
    }

    public function destroy(Request $request, $id)
    {
        $ben = \App\FCDABeneficiary::find($id);

        if(!$ben)
        {
            \Session::flash('warning', 'Beneficiary not found!');
            return redirect()->back();
        }

        $planning_ben = \App\FCDAPlanningBen::where('f_c_d_a_beneficiary_id', $id)->get();

        if($planning_ben)
        {
            foreach($planning_ben as $p)
            {
                $p->delete();
            }
        }
        $ben->delete();

        \Session::flash('success', 'Profile successfully deleted.');
        return redirect()->back();
    }
}
