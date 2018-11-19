<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class PriceController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request->query('search'))
        {
            $crops_and_economic_trees = \App\CropGrade::where('crop', $request->query('search'))->paginate(20);
        }
        else
        {
            $crops_and_economic_trees = \App\CropGrade::latest()->paginate(20);
        }

        return view('pages.pricing.crops.index', compact('crops_and_economic_trees'));
    }

    public function create(Request $request)
    {
        return view('pages.pricing.crops.create');
    }

    public function store(Request $request)
    {
        $data = array(
            'crop'      =>  $request->crop,
            'grade'     =>  $request->grade,
            'price'     =>  $request->price,
            'space_requirement_1'   =>  $request->space_requirement_1,
            'space_requirement_2'   =>  $request->space_requirement_2,
            'remarks'   =>  $request->remarks
        );

        $validator = \Validator::make($data, [
            'crop'      =>  'required|string',
            'grade'     =>  'required', Rule::in(['A', 'B', 'C']),
            'price'     =>  'required|numeric',
            'space_requirement_1'   =>  'required|numeric',
            'space_requirement_2'   =>  'required|numeric',
            'remarks'       =>  'nullable|string',
        ]);

        if($validator->fails())
        {
            \Session::flash('warning', 'You have some validation errors. Please attend to them before proceeding.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $exists = \App\CropGrade::where('crop', $data['crop'])->where('grade', $data['grade'])->where('price', $data['price'])->first();
        if(count($exists) > 0)
        {
            \Session::flash('warning', 'There is an item similar to this kindly update this item or create a new one.');
            return redirect()->back()->withInput();
        }
        \App\CropGrade::create($data);
        \Session::flash('success', 'Item successfully added.');
        return redirect()->route('pricing.index');
    }

    public function edit(Request $request, $id)
    {
        $crops_and_economic_tree = $this->get_crop($id);

        return view('pages.pricing.crops.edit', compact('crops_and_economic_tree'));
    }

    public function update(Request $request, $id)
    {
        $crops_and_economic_tree = $this->get_crop($id);
        $data = array(
            'crop'      =>  $request->crop,
            'grade'     =>  $request->grade,
            'price'     =>  $request->price,
            'space_requirement_1'   =>  $request->space_requirement_1,
            'space_requirement_2'   =>  $request->space_requirement_2,
            'remarks'   =>  $request->remarks
        );

        $validator = \Validator::make($data, [
            'crop'      =>  'required|string',
            'grade'     =>  'required', Rule::in(['A', 'B', 'C']),
            'price'     =>  'required|numeric',
            'space_requirement_1'   =>  'required|numeric',
            'space_requirement_2'   =>  'required|numeric',
            'remarks'       =>  'nullable|string',
        ]);

        if($validator->fails())
        {
            \Session::flash('warning', 'You have some validation errors. Please attend to them before proceeding.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $crops_and_economic_tree->update($data);
        \Session::flash('success', 'Update successful.');
        return redirect()->route('pricing.index');
    }

    public function destroy($id)
    {
        $crop = $this->get_crop($id);
        $crop->delete();
        return response()->json("1");
    }

    public function get_crop($id)
    {
        return \App\CropGrade::findOrFail($id);
    }

}
