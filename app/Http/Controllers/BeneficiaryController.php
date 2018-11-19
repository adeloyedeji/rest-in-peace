<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('search'))
        {
            $beneficiaries = \App\Beneficiary::where('code', 'LIKE', $request->query('search') . '%')->latest()->paginate(15);
        }
        else
        {
            $beneficiaries = \App\Beneficiary::latest()->paginate(15);
        }
        return view('pages.beneficiaries.index', [
            'beneficiaries' =>  $beneficiaries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = 0;
        $project_id = 0;
        // \session()->forget('step');
        if($request->query('project_id')) {
            $project_id = $request->query('project_id');
        }
        if($request->query('stage')) {
            \session(['step' => $request->query('stage')]);
        }
        $states = \App\State::all();
        $projects = \App\Project::all();
        if(!\Session::has('step')) {
            \session(['step' => 1]);
        }
        if($request->query('id')) {
            $id = $request->query('id');
        }
        return view('pages.beneficiaries.forms.create', [
            'states'        =>  $states,
            'projects'      =>  $projects,
            'id'            =>  $id,
            'project_id'    =>  $project_id
        ]);
    }

    public function planningForm(Request $request)
    {
        $states = \App\State::all();
        $projects = \App\Project::all();
        return view('pages.beneficiaries.forms.planning-create', [
            'states'    =>  $states,
            'projects'  =>  $projects,
        ]);
    }

    public function mcForm(Request $request)
    {
        $states = \App\State::all();
        $projects = \App\Project::all();

        return view('pages.beneficiaries.forms.monitoring-and-control-create', [
            'states'    => $states,
            'projects'  => $projects
        ]);
    }

    public function structureForm(Request $request)
    {
        $id = 0;
        $project_id = 0;
        // \session()->forget('step');
        if($request->query('project_id')) {
            $project_id = $request->query('project_id');
        }
        $states = \App\State::all();
        $projects = \App\Project::all();
        if($request->query('id')) {
            $id = $request->query('id');
        }
        return view('pages.beneficiaries.forms.structure-create', [
            'states'        =>  $states,
            'projects'      =>  $projects,
            'id'            =>  $id,
            'project_id'    =>  $project_id
        ]);
    }

    public function cetForm(Request $request)
    {
        $id = 0;
        $project_id = 0;
        // \session()->forget('step');
        if($request->query('project_id')) {
            $project_id = $request->query('project_id');
        }
        if($request->query('stage')) {
            \session(['step' => $request->query('stage')]);
        }
        $states = \App\State::all();
        $projects = \App\Project::all();
        if(!\Session::has('step')) {
            \session(['step' => 1]);
        }
        if($request->query('id')) {
            $id = $request->query('id');
        }
        return view('pages.beneficiaries.forms.cet-create', [
            'states'        =>  $states,
            'projects'      =>  $projects,
            'id'            =>  $id,
            'project_id'    =>  $project_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opcode = $request->opcode;

        if($opcode == 1) {
            // beneficiary basic information
            if(\Auth::user()->role_id == 7 || \Auth::user()->role_id == 9) {
                $data = array(
                    'code'              =>  $request->code,
                    'name'              =>  $request->name,
                    'occupation'        =>  $request->occupation,
                    'wives_total'       =>  0,
                    'child_total'       =>  0,
                    'gender'            =>  $request->gender,
                    'dob'               =>  $request->year . "-" . ($request->month < 10 ? "0" . $request->month : $request->month) . "-" . ($request->day < 10 ? "0" . $request->day : $request->day),
                    'household_size'    =>  '1 - 2',
                    'tribe'             =>  $request->tribe,
                    'village'           =>  $request->village,
                );
            } else {
                $data = array(
                    'code'              =>  $request->code,
                    'name'              =>  $request->name,
                    'occupation'        =>  $request->occupation,
                    'wives_total'       =>  $request->wives,
                    'child_total'       =>  $request->child,
                    'gender'            =>  $request->gender,
                    'dob'               =>  $request->year . "-" . ($request->month < 10 ? "0" . $request->month : $request->month) . "-" . ($request->day < 10 ? "0" . $request->day : $request->day),
                    'household_size'    =>  $request->household_size,
                    'tribe'             =>  $request->tribe,
                    'village'           =>  $request->village,
                );
            }
            $validator = \Validator::make($data, [
                'code'              =>  'required|string|unique:beneficiaries',
                'name'              =>  'required|string',
                'occupation'        =>  'required|string',
                'wives_total'       =>  'required|numeric',
                'child_total'       =>  'required|numeric',
                'gender'            =>  'required|numeric',
                'dob'               =>  'required|date_format:Y-m-d',
                'household_size'    =>  'required|string',
                'tribe'             =>  'required|string',
            ]);

            if($validator->fails()) {
                \Session::flash('warning', 'You have some validation errors.');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['phone'] = 'PENDING';
            $data['household_head'] = 'PENDING';
            $data['household_head_photo'] = 'PENDING';
            $data['street'] = 'PENDING';
            $data['city'] = 'PENDING';
            $data['lgas_id'] = 0;
            $data['states_id'] = 0;
            $data['created_by'] = \Auth::id();

            $beneficiary = \App\Beneficiary::create($data);
            if($request->project_id > 0) {
                \App\ProjectBeneficiary::create([
                    'project_id'    =>  $request->project_id,
                    'beneficiary_id'    =>  $beneficiary->id
                ]);
            }
            \session(['step' => 2]);
            \Session::flash('success', 'Basic information was successfully saved.');
            return redirect()->route('beneficiaries.create', ['id' => $beneficiary->id]);
        } else if($opcode == 2) {
            // API to save beneficiary contact info
            $bid = $request->bid;

            $beneficiary = \App\Beneficiary::find($bid);

            if(!$beneficiary) {
                \Session::flash('error', 'Beneficiary not found!');
                return redirect()->back()->withInput();
            }
            $data = array(
                'phone'     =>  $request->phone,
                'email'     =>  $request->email,
                'street'    =>  $request->address,
                'city'      =>  $request->city,
                'states_id' =>  $request->states,
                // 'lgas_id'   =>  $request->lgas,
            );

            $validator = \Validator::make($data, [
                'phone'     =>  'required|string',
                'email'     =>  'nullable|string',
                'street'    =>  'required|string',
                'city'      =>  'required|string',
                'states_id' =>  'required|numeric',
                // 'lgas_id'   =>  'required|numeric',
            ], [
                'phone.required'        => 'The Phone Number field is required',
                'street.required'       => 'Address field is required',
                'city.required'         => 'The City field is required',
                // 'lgas_id.required'      => 'Local area government field is required.'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $beneficiary->update($data);
            if(\Auth::user()->role_id == 7 || \Auth::user()->role_id == 9) {
                \session(['step' => 4]);
            } else {
                \session(['step' => 3]);
            }
            \Session::flash('success', 'Contact information was successfully saved.');
            return redirect()->route('beneficiaries.create', ['id' => $bid]);
        } else if($opcode == 3) {
            // API to confirm done with beneficiary dependents.
            $bid = $request->bid;

            $beneficiary = \App\Beneficiary::find($bid);

            if(!$beneficiary) {
                \Session::flash('error', 'Beneficiary not found!');
                return redirect()->back();
            }

            \session(['step' => 4]);
            return redirect()->route('beneficiaries.create', ['id' => $bid]);
        } else if($opcode == 4) {
            // API for saving beneficiary photo.
            if($request->hasFile('file')) {
                $bid = $request->bid;
                $ben = \App\Beneficiary::find($bid);

                if(!$ben) {
                    return response()->json("404");
                }

                $avatar = $request->file('file')->store('public/beneficiaries/avatars');

                $status = $ben->update([
                    'household_head_photo'  =>  $avatar,
                ]);

                return response()->json($status);
            }
            return response()->json("404");
        } else if($opcode == 5) {
            // API for uploading finger print
            dd("iuhiuhiuh");
            dd($request->all());
            dd($fingers[0]->store('public/beneficiaries/finger-print-samples'));
        } else if($opcode == 6) {
            $validator = \Validator::make($request->all(), [
                'code'      =>  'required|string|max:100|unique:beneficiaries',
                'project'   =>  'required|numeric'
            ]);
            if($validator->fails()) {
                return response()->json($validator->errors());
            }
            $data = array(
                'code'              =>  $request->code,
                'nname'             =>  'PENDING',
                'occupation'        =>  'PENDING',
                'wives_total'       =>  0,
                'child_total'       =>  0,
                'gender'            =>  0,
                'dob'               =>  date("Y-m-d"),
                'household_size'    =>  '1 - 2',
                'tribe'             =>  'PENDING',
            );
            $data['phone'] = 'PENDING';
            $data['household_head'] = 'PENDING';
            $data['household_head_photo'] = 'PENDING';
            $data['street'] = 'PENDING';
            $data['city'] = 'PENDING';
            $data['lgas_id'] = 0;
            $data['states_id'] = 0;
            $data['created_by'] = \Auth::id();
            $beneficiary = \App\Beneficiary::create($data);
            \App\ProjectBeneficiary::create([
                'project_id'    =>  $request->project,
                'beneficiary_id'    =>  $beneficiary->id
            ]);
            return response()->json(array('bid' => $beneficiary->id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        \session()->forget('step');
        $ben = \App\Beneficiary::find($id);

        if(!$ben) {
            abort("404");
        }

        $crops              = [];
        $structures         = [];
        $projects           = \App\Project::latest()->get();
        $bioMetrics         = \App\BeneficiaryBio::where('beneficiaries_id', $id)->first();
        $assignedProjects   = \App\ProjectBeneficiary::where('beneficiary_id', $id)->get();
        $cropProperty       = \App\Property::where('beneficiaries_id', $id)->where('type', 1)->get();
        $structureProperty  = \App\Property::where('beneficiaries_id', $id)->where('type', 2)->get();
        $properties         = \App\Property::where('beneficiaries_id', $id)->get();

        foreach($properties as $p)
        {
            if($p->type == 1)
            {
                // crop
                $item = \App\PropertyCrop::where('properties_id', $p->id)->first();
                if(count($item) > 0)
                {
                    $p->valuation = $item->total;
                }
                else
                {
                    $p->valuation = 0;
                }
            }
            else
            {
                $items = \App\PropertyStructure::where('properties_id', $p->id)->get();
                if(count($items) > 0)
                {
                    foreach($items as $it)
                    {

                    }
                }
                else
                {

                }
            }
        }

        if(count($structureProperty) > 0)
        {
            foreach($structureProperty as $s)
            {
                $st = \App\PropertyStructure::where('properties_id', $s->id)->first();
                if(count($st) > 0)
                {
                    $structures[] = $st;
                }
            }
        }
        if(count($cropProperty) > 0)
        {
            $crops      = \App\CropPropertyData::where('beneficiary_id', $ben->id)->get();
        }
        return view('pages.beneficiaries.show', [
            'beneficiary'       =>  $ben,
            'projects'          =>  $projects,
            'assignedProjects'  =>  $assignedProjects,
            'structures'        =>  $structures,
            'crops'             =>  $crops,
            'bioMetrics'        =>  $bioMetrics,
            'properties'        =>  $properties
        ]);
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

    public function launchFingerPrint() {
        \Log::info('attempting to start finger print capture sdk...');
        // exec("C:\\wamp64\\www\\rms\\fcda\\storage\\app\\public\\beneficiaries\\fingers\\WorkedEx.exe");
        // $launch = shell_exec();
        $command = "C:\IntelPython3\python.exe C:\wamp64\www\rms\fcda\app\Http\Controllers\FingerPrint.py";
        // shell_exec($command);
        exec("C:\\wamp64\\www\\rms\\fcda\\public\\futronic\\WorkedEx.exe");
        \Log::info('Done loading finger print sdk. You can start capturing.');
        return response()->json("done", 200);
    }

    public function fingerPrintUpload(Request $request, $id) {
        $fingerPrints = \App\BeneficiaryBio::where('beneficiaries_id', $id)->first();
        return view('pages.beneficiaries.finger-print', ['id' => $id, 'samples' => $fingerPrints]);
    }

    public function fingerPrintStore(Request $request) {
        $bid = $request->bid;
        $sampleCount = count($request->file('fingers'));
        if($sampleCount < 4) {
            \Session::flash('error', 'Please upload all finger print samples to continue.');
            return redirect()->back()->with(['id' => $bid]);
        }

        $ben = \App\Beneficiary::find($bid);

        if(!$ben) {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back()->with(['id' => $bid]);
        }

        $fingers = $request->file('fingers');

        $finger1 = $fingers[0]->store('public/beneficiaries/finger-print-samples');
        $finger2 = $fingers[1]->store('public/beneficiaries/finger-print-samples');
        $finger3 = $fingers[2]->store('public/beneficiaries/finger-print-samples');
        $finger4 = $fingers[3]->store('public/beneficiaries/finger-print-samples');

        $data = array(
            'beneficiaries_id'  =>  $bid,
            'finger1'           =>  $finger1,
            'finger2'           =>  $finger2,
            'finger3'           =>  $finger3,
            'finger4'           =>  $finger4,
        );

        $fingerPrints = \App\BeneficiaryBio::create($data);

        \Session::flash('success', 'Finger print enrollment successful.');
        \session()->forget('step');
        return redirect()->back()->with(['id', $bid]);
    }

    public function fingerPrintVerify($beneficiaryID) {
        return response()->json(\App\BeneficiaryBio::where('beneficiaries_id', $beneficiaryID)->count());
    }

    public function search(Request $request) {
        return view('pages.beneficiaries.search');
    }

    public function faceSearch(Request $request) {
        $resp = array(
            'status'    =>  100,
            'msg'       =>  'pending'
        );
        if($request->hasFile('file')) {
            $temp = array();
            $resp = array(
                'status'    =>  100,
                'msg'       =>  []
            );
            $avatar = $request->file('file')->store('public/beneficiaries/temp');
            $image = $avatar;
            // $image = str_replace("/", "\\", storage_path("app/$avatar"));
            // $consoleCommand = "C:\\IntelPython3\\python.exe C:\\wamp64\\www\imagerecognition\\app\Http\Controllers\\ClassCompare.py $image";
            $consoleCommand = "C:\\IntelPython3\\python.exe C:\\wamp64\\www\\fcda\\app\\Http\\Controllers\\ClassCompare.py $image";
            $imgCompare = shell_exec($consoleCommand);
            $dataArr = explode(",", $imgCompare);
            // return response()->json($dataArr);
            if($dataArr[0] == "401") {
                $resp['status'] = 200;
                $resp['msg']    = "user not found!";
            } else {
                foreach($dataArr as $d) {
                    if(is_numeric($d)) {
                        array_push($temp, \App\Beneficiary::find(intval($d)));
                    }
                }
                $resp['status'] = 300;
                $resp['msg'] = $temp;
            }
        } else {
            return response()->json("no image");
        }
        return response()->json($resp);
    }

    public function textSearch(Request $request, $needle) {
        $matches = \App\Beneficiary::where('id', $needle)
                                    ->orWhere('code', 'LIKE', '%' . $needle . '%')
                                    ->orWhere('fname', 'LIKE', '%' . $needle . '%')
                                    ->orWhere('lname', 'LIKE', '%' . $needle . '%')
                                    ->orWhere('phone', 'LIKE', '%' . $needle . '%')
                                    ->get();
        if($request->ajax()) {
            return response()->json($matches);
        }
        return $matches;
    }
}
