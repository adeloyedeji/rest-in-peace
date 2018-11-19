<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MCController extends Controller
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
            $bens = \App\FCDAMCBen::where('code', 'LIKE', '%' . $request->query('search') . '%')->latest()->get();
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
            $beneficiaries = \App\FCDABeneficiary::where('type', 3)->latest()->paginate(20);
        }
        return view('pages.mc.beneficiaries', compact('beneficiaries'));
    }

    public function store(Request $request)
    {
        $ben_data = array(
            'name'      => $request->name,
            'gender'    => $request->gender,
            'photo'     => $request->file('file')->store('public/beneficiaries/avatars'),
            'type'      => 3
        );

        $ben_validator = \Validator::make($ben_data, [
            'name'      => 'required|string|max:191',
            'gender'    => 'required|integer',
        ]);

        if($ben_validator->fails())
        {
            return response()->json($ben_validator->errors());
        }

        if($request->state_of_origin == 0)
        {
            $d = array(
                'state_of_origin'   => 'Select a valid state of origin'
            );
            return response()->json($d);
        }

        $mc_data = array(
            'code'              => $request->code,
            'project_id'        => $request->project,
            'address'           => $request->address,
            'city'              => $request->city,
            'phone'             => $request->phone,
            'date_of_birth'     => $request->year . '-' . $request->month . '-' . $request->day,
            'state_of_origin'   => $request->state_of_origin,
            'tribe'             => $request->tribe,
            'amount_collected'  => $request->amount_collected,
        );

        $mc_validator = \Validator::make($mc_data, [
            'code'              => 'required|string|unique:f_c_d_a_m_c_bens',
            'project_id'        => 'required|numeric',
            'address'           => 'required|string',
            'tribe'             => 'required|string',
            'city'              => 'required|string',
            'phone'             => 'required|string',
            'date_of_birth'     => 'required',
            'state_of_origin'   => 'required|numeric',
            'amount_collected'  => 'required|numeric'
        ]);

        if($mc_validator->fails())
        {
            return response()->json($mc_validator->errors());
        }

        $ben = \App\FCDABeneficiary::create($ben_data);

        $mc_data['f_c_d_a_beneficiary_id'] = $ben->id;

        $mc_profile = \App\FCDAMCBen::create($mc_data);

        $resp = array(
            'status'    => 'ok',
            'bid'       => $ben->id,
            'mc_id'     => $mc_profile->id
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
        $mc_profile = \App\FCDAMCBen::find($pid);

        if(!$mc_profile)
        {
            \Session::flash('warning', 'Beneficiary profile not found!');
            return redirect()->back();
        }

        $project = \App\Project::find($mc_profile->project_id);

        return view('pages.mc.beneficiary', compact('ben', 'project', 'mc_profile'));
    }

    public function edit(Request $request, $bid, $mc_id)
    {
        $ben = \App\FCDABeneficiary::find($bid);

        if(!$ben)
        {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back();
        }

        $monitoring_and_control_profile = [];
        $year = 0;
        $month = 0;
        $day = 0;
        if($mc_id != 0)
        {
            $monitoring_and_control_profile = \App\FCDAMCBen::find($mc_id);
            $year   = date('Y', strtotime($monitoring_and_control_profile->date_of_birth));
            $month  = date('m', strtotime($monitoring_and_control_profile->date_of_birth));
            $day    = date('d', strtotime($monitoring_and_control_profile->date_of_birth));
        }

        $states = \App\State::all();
        $projects = \App\Project::all();
        return view('pages.mc.beneficiary-edit', compact('ben', 'monitoring_and_control_profile', 'states', 'projects', 'year', 'month', 'day', 'mc_id'));
    }

    public function update(Request $request)
    {
        $ben = \App\FCDABeneficiary::find($request->ben);
        if(!$ben)
        {
            \Session::flash('warning', 'Beneficiary not found!');
            return redirect()->back();
        }
        if($request->state_of_origin == 0)
        {
            \Session::flash('warning', 'Select a valid state of origin');
            return redirect()->back();
        }

        $ben_data = array(
            'name'      => $request->name,
            'gender'    => $request->gender,
            'type'      => 3
        );

        $ben_validator = \Validator::make($ben_data, [
            'name'      => 'required|string|max:191',
            'gender'    => 'required|integer',
        ]);

        if($ben_validator->fails())
        {
            \Session::flash('warning', 'Please attend to the following validation errors.');
            return redirect()->back()->withErrors($ben_validator->errors());
        }

        if($request->hasFile('photo'))
        {
            $ben_data['photo'] = $request->file('file')->store('public/beneficiaries/avatars');
        }

        $mc_data = array(
            'project_id'        => $request->project,
            'code'              => $request->code,
            'address'           => $request->address,
            'city'              => $request->city,
            'phone'             => $request->phone,
            'date_of_birth'     => $request->year . '-' . $request->month . '-' . $request->day,
            'state_of_origin'   => $request->state_of_origin,
            'tribe'             => $request->tribe,
            'amount_collected'  => $request->amount_collected,
        );

        $mc_validator = \Validator::make($mc_data, [
            'project_id'        => 'required|numeric',
            'address'           => 'required|string',
            'tribe'             => 'required|string',
            'city'              => 'required|string',
            'phone'             => 'required|string',
            'date_of_birth'     => 'required',
            'state_of_origin'   => 'required|numeric',
            'amount_collected'  => 'required|numeric'
        ]);

        if($mc_validator->fails())
        {
            \Session::flash('warning', 'Please attend to the following validation errors.');
            return redirect()->back()->withErrors($mc_validator->errors());
        }

        $ben->update($ben_data);
        $mc_data['f_c_d_a_beneficiary_id'] = $ben->id;
        if($request->mc_id == 0)
        {
            // something happened when the beneficiary was been created and for certain reasons the monitoring and control profile was not created.
            // so we have to create.
            $monitoring_and_control_profile = \App\FCDAMCBen::create($mc_data);
            \Session::flash('success', 'Profile update successful.');
            return redirect()->route('monitoring-and-control.edit', ['bid' => $ben->id, 'mc_id' => $monitoring_and_control_profile->id]);
        }
        else
        {
            // just update it.
            $monitoring_and_control_profile = \App\FCDAMCBen::where('code', $request->code)->first();
            $monitoring_and_control_profile->update($mc_data);
            \Session::flash('success', 'Profile update successful.');
            return redirect()->route('monitoring-and-control.edit', ['bid' => $ben->id, 'mc_id' => $monitoring_and_control_profile->id]);   
        }
    }

    public function destroy(Request $request, $id)
    {
        $ben = \App\FCDABeneficiary::find($id);
        
        if(!$ben)
        {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back();
        }
        $mc_ben = \App\FCDAMCBen::where('f_c_d_a_beneficiary_id', $id)->get();

        $ben->delete();
        if($mc_ben)
        {
            foreach($mc_ben as $m)
            {
                $m->delete();
            }
        }
        \Session::flash('success', 'Beneficiary successfully deleted.');
        return redirect()->back();
    }
}
