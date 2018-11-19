<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $property = $properties = [];
        $property = \App\Property::where('beneficiaries_id', $id)->first();
        if(count($property) > 0) {
            $properties = \App\PropertyStructure::where('properties_id', $property->id)->get();
        }
        $ben = \App\Beneficiary::find($id);
        return view('pages.properties.index', ['id' => $id, 'ben' => $ben, 'property' => $property, 'properties' => $properties]);
    }

    public function hasProperty($beneficiaryID, $type) {
        $hasProperty = 0;
        $property = \App\Property::where('beneficiaries_id', $beneficiaryID)->where('type', $type)->first();

        if(count($property) > 0) {
            $hasProperty = 1;
        }
        return $hasProperty;
    }

    public function setProperty($beneficiaryID, $type) {
        $data = array(
            'beneficiaries_id'  =>  $beneficiaryID,
            'type'              =>  $type,
            'ownership'         =>  'SELF',
            'approved'          =>  1,
            'plan'              =>  'PLAN',
            'has_trees'         =>  0,
            'others1'           =>  'NONE',
            'others2'           =>  'NONE',
            'others3'           =>  'NONE',
        );
        return \App\Property::create($data);
    }

    public function getProperty($beneficiaryID, $type) {
        return \App\Property::where('beneficiaries_id', $beneficiaryID)->where('type', $type)->first();
    }

    public function structureIndex(Request $request, $id, $property_id) {
        // $property_id;
        // nigga enough of restrictions. Beneficiaries can have multiple properties
        // if($this->hasProperty($id, 1)) {
        //     $property = $this->getProperty($id, 1);
        //     $property_id = $property->id;
        // } else {
        //     $property = $this->setProperty($id, 1);
        //     $property_id = $property->id;
        // }
        // $property_id = $property->id;
        $beneficiary = \App\Beneficiary::find($id);
        if(count($beneficiary) <= 0)
        {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back();
        }
        $property   = $property_id;
        $properties = app('App\Http\Controllers\ProjectController')->beneficiaryProperties(null, $id, 2);
        return view('pages.properties.forms.structures.index', ['id' => $id, 'property_id' => $property_id, 'beneficiary' => $beneficiary, 'property' => $property, 'properties' => $properties]);
    }

    public function structureStore(Request $request) {
        if($request->hasFile('proof')) {
            $data = array(
                'properties_id'             =>  $request->property_id,
                'type'                      =>  $request->type,
                'address'                   =>  $request->address,
                'size_of_land'              =>  $request->size_of_land,
                'size_of_building'          =>  $request->size_of_building ? $request->size_of_building : 'N/A',
                'area'                      =>  $request->area,
                'description'               =>  $request->description,
                'date_of_inspection'        =>  $request->year . "-" . ($request->month < 10 ? "0" . $request->month : $request->month) . "-" . ($request->day < 10 ? "0" . $request->day : $request->day),
                'roof'                      =>  $request->roof,
                'ceiling'                   =>  $request->ceiling,
                'wall'                      =>  $request->wall,
                'window'                    =>  $request->window,
                'door'                      =>  $request->door,
                'fence'                     =>  $request->fence,
                'state_of_repairs'          =>  $request->state_of_repairs,
                'accomodation'              =>  $request->accomodation,
                'valuation_of_structure'    =>  $request->valuation_of_structure,
            );

            $validator = \Validator::make($data, [
                'type'                      => 'required|string',
                'address'                   => 'required|string',
                'size_of_land'              => 'required|string',
                'size_of_building'          =>  'nullable|string',
                'area'                      => 'required|string',
                'description'               => 'nullable|string',
                'date_of_inspection'        => 'required|date_format:Y-m-d',
                'roof'                      => 'nullable|string',
                'ceiling'                   => 'nullable|string',
                'wall'                      => 'nullable|string',
                'window'                    => 'nullable|string',
                'door'                      => 'nullable|string',
                'fence'                     => 'nullable|string',
                'state_of_repairs'          => 'nullable|string',
                'accomodation'              => 'nullable|string',
                'valuation_of_structure'    => 'required|string',
            ]);

            $data['proof'] = $request->file('proof')->store('public/beneficiaries/proofs');

            if($validator->fails()) {
                \Session::flash('error', 'You have some errors in your form. Fix each error to continue.');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['total_valuation'] = 0.00;

            $structure = \App\PropertyStructure::create($data);
            \Session::flash('success', 'Structure successfully created.');
            return redirect('beneficiaries/' . $request->bid);
        } else {
            \Session::flash('warning', 'You need to upload proof of ownership to continue.');
            return redirect()->back();
        }
    }

    public function getStructureProperty(Request $request, $id) {
        $property = \App\PropertyStructure::find($id);

        if(count($property) <= 0) {
            return response()->json("404");
        } else {
            return response()->json($property);
        }
    }

    public function evaluateStructureProperty(Request $request) {
        $pid = $request->p;
        $evaluation = $request->e;

        $property = \App\PropertyStructure::find($pid);

        if(count($request) > 0) {
            $property->update([
                'total_valuation'   =>  $evaluation
            ]);
            \Session::flash('success', 'Evaluation complete.');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Property not found!');
            return redirect()->back();
        }
    }

    public function cropIndex(Request $request, $id, $property_id) {
        // $property_id;
        // the commented section below was commented out because it limits a beneficiary to have one property.
        // if($this->hasProperty($id, 2)) {
        //     $property = $this->getProperty($id, 2);
        //     $property_id = $property->id;
        // } else {
        //     $property = $this->setProperty($id, 2);
        //     $property_id = $property->id;
        // }

        // new implementation: admins can add multiple properties to a beneficiary.
        // $property = $this->setProperty($id, 2);
        // $property_id = $property->id;

        $beneficiary = \App\Beneficiary::find($id);
        if(count($beneficiary) <= 0)
        {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back();
        }
        $property    = $property_id;
        return view('pages.properties.forms.crops-and-economic-trees.index', ['id' => $id, 'property_id' => 2, 'beneficiary' => $beneficiary, 'property' => $property]);
    }

    public function cropTreeStore(Request $request) {
        $data = array(
            'properties_id'         =>  $request->properties_id,
            'owner_present'         =>  $request->owner_present,
            'date_of_inspection'    =>  $request->date_of_inspection,
            'remarks'               =>  $request->remarks,
            'total'                 =>  $request->total
        );

        $validator = \Validator::make($data, [
            'properties_id'         =>  'required|numeric',
            'owner_present'         =>  'required|string',
            'date_of_inspection'    =>  'required|date_format:Y-m-d',
            'remarks'               =>  'nullable|string',
            'total'                 =>  'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $property = \App\PropertyCrop::where('properties_id', $data['properties_id'])->first();
        if(count($property) > 0)
        {
            // update the record
            $property = $property->update($data);
        }
        else
        {
            // create the record.
            $property = \App\PropertyCrop::create($data);
        }
        \Session::flash('success', 'Crop/Economic Trees was successfully saved.');

        return response()->json('ok');
    }

    public function cropTreeGetItem(Request $request, $beneficiaryID, $property_id) {
        return response()->json(\App\CropPropertyData::where('beneficiary_id', $beneficiaryID)->where('property_id', $property_id)->get());
    }

    public function cropTreeStoreItem(Request $request) {
        $data = array(
            'crop_grades_id'    =>  $request->crop_grades_id,
            'length'            =>  $request->length,
            'breadth'           =>  $request->breadth,
            'number_of_items'   =>  $request->number_of_items,
            'size_of_farm'      =>  $request->size_of_farm,
            'grade'             =>  $request->grade,
            'valuation'         =>  $request->valuation,
            'beneficiary_id'    =>  $request->beneficiary_id,
            'property_id'       =>  $request->property_id,
        );

        $validator = \Validator::make($data, [
            'crop_grades_id'    =>  'required|numeric',
            'length'            =>  'required|numeric',
            'breadth'           =>  'required|numeric',
            'number_of_items'   =>  'required|numeric',
            'size_of_farm'      =>  'required|numeric',
            'grade'             =>  'required|string',
            'valuation'         =>  'required|numeric',
            'beneficiary_id'    =>  'required|numeric',
            'property_id'       =>  'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $crop = \App\CropPropertyData::create($data);
        $crop = \App\CropPropertyData::find($crop->id);
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        return response()->json($crop);
    }

    public function propertyCreate(Request $request, $id)
    {
        // check if beneficiary exists.
        $beneficiary = \App\Beneficiary::find($id);
        if(count($beneficiary) > 0)
        {
            // beneficiary exist. Proceed to show the form for creating a new property
            $projects           = \App\Project::latest()->get();
            $bioMetrics         = \App\BeneficiaryBio::where('beneficiaries_id', $id)->first();
            $assignedProjects   = \App\ProjectBeneficiary::where('beneficiary_id', $id)->get();
            return view('pages.properties.create', compact('beneficiary', 'projects', 'assignedProjects', 'bioMetrics'));
        }
        else
        {
            \Session::flash('error', 'Beneficiary not found!');
            return redirect()->back();
        }
    }

    public function propertyStore(Request $request)
    {
        $data = array(
            'beneficiaries_id'  =>  $request->bid,
            'property_code'     =>  $request->property_code,
            'project_id'        =>  $request->project_id,
            'type'              =>  $request->type,
            'ownership'         =>  $request->ownership,
            'approved'          =>  $request->approved,
            'has_trees'         =>  0,
            'others1'           =>  $request->others1,
            'others2'           =>  $request->others2,
            'others3'           =>  $request->others3,
        );

        $validator = \Validator::make($data, [
            'beneficiaries_id'  =>  'required|numeric',
            'property_code'     =>  'required|string|unique:properties',
            'project_id'        =>  'required|numeric',
            'type'              =>  'required|numeric',
            'ownership'         =>  'required|string',
            'approved'          =>  'required|numeric',
            'plan'              =>  'nullable|image',
            'others1'           =>  'nullable|string',
            'others2'           =>  'nullable|string',
            'others3'           =>  'nullable|string',
        ], [
            'project_id.numeric'    =>  'Assign beneficiary to a project to continue.'
        ]);

        if ($validator->fails())
        {
            \Session::flash('error', 'You have some errors in your form. Fix each error to continue.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('plan'))
        {
            $data['plan'] = $request->file('plan')->store('public/beneficiaries/plans');
        }
        else
        {
            $data['plan'] = 'NO-PLAN';
        }
        $property = \App\Property::create($data);
        if($data['type'] == 1)
        {
            // crops
            return redirect()->route('properties.crops.index', ['id' => $data['beneficiaries_id'], 'property_id' => $property->id]);
        }
        else
        {
            // structures
            return redirect()->route('properties.structure.index', ['id' => $data['beneficiaries_id'], 'property_id' => $property->id]);
        }
    }

    public function destroyProperty($property_id)
    {
        $property = \App\Property::find($property_id);
        if(count($property) <= 0)
        {
            \Session::flash('error', 'Property not found!');
            return redirect()->back();
        }
        else
        {
            if($property->type == 1)
            {
                \App\PropertyCrop::where('properties_id', $property->id)->delete();
                $crops = \App\CropPropertyData::where('property_id', $property->id)->get();
                if(count($crops) > 0)
                {
                    foreach($crops as $c)
                    {
                        $c->delete();
                    }
                }
            }
            else
            {
                \App\PropertyStructure::where('properties_id', $property->id)->delete();
            }
        }
        $property->delete();
        \Session::flash('success', 'Property successfully deleted.');
        return redirect()->back();
    }
}
