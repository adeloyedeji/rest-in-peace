<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\FCDAInterface;

class FCDAController extends Controller
{
    protected $fcda;
    public function __construct(FCDAInterface $fcda)
    {
        $this->middleware('auth');
        $this->fcda = $fcda;
    }

    public function beneficiaries(Request $request)
    {
        $beneficiaries = $this->fcda->get_beneficiaries();

        return view('pages.fcda.beneficiaries', compact('beneficiaries'));
    }
}
