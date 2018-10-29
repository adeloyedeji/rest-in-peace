<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me()
    {
        $total_beneficiaries = \App\Beneficiary::where('created_by', \Auth::id())->count();
        return view('pages.profiles.me', compact('total_beneficiaries'));
    }

    public function store(Request $request)
    {
        $data = array(
            'fname' =>  $request->fname ? $request->fname : \Auth::user()->fname,
            'lname' =>  $request->lname ? $request->lname : \Auth::user()->lname,
            'oname' =>  $request->oname ? $request->oname : \Auth::user()->oname,
            'phone' =>  $request->phone ? $request->phone : \Auth::user()->phone,
        );

        $validator;
        if(\Auth::user()->role_id == 1)
        {
            $data['username'] = $request->username ? $request->username : \Auth::user()->username;
            $data['email'] = $request->email ? $request->email : \Auth::user()->email;
            $validator = \Validator::make($data, [
                'fname' =>  'required|string|max:191',
                'lname' =>  'required|string|max:191',
                'oname' =>  'nullable|string|max:191',
                'phone' =>  'required|string|max:191',
                'username'  => 'required|string|max:20',
                'email' =>  'required|email|unique:users'
            ]);
        }
        else
        {
            $validator = \Validator::make($data, [
                'fname' =>  'required|string|max:191',
                'lname' =>  'required|string|max:191',
                'oname' =>  'nullable|string|max:191',
                'phone' =>  'required|string|max:191',
            ]);
        }

        if($validator->fails())
        {
            \Session::flash('warning', 'You have some validation errors.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('avatar'))
        {
            $data['avatar'] = $request->file('avatar')->store('public/users/avatars');
        }

        \Auth::user()->update($data);
        \Session::flash('success', 'Profile update successful.');
        return redirect()->back();
    }
}
