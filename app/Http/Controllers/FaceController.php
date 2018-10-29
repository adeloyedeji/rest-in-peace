<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function search(Request $request) {
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
            $avatar = $request->file('file')->store('public/temp');
            $image = str_replace("/", "\\", storage_path("app/$avatar"));
            // $consoleCommand = "C:\\IntelPython3\\python.exe C:\\wamp64\\www\imagerecognition\\app\Http\Controllers\\ClassCompare.py $image";
            $consoleCommand = "C:\\IntelPython3\\python.exe C:\\wamp64\\www\\fcda\\app\\Http\\Controllers\\ClassCompare.py $image";
            $imgCompare = shell_exec($consoleCommand);
            $dataArr = explode(",", $imgCompare);
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
        }
        return response()->json($resp);
    }

    public function upload(Request $request) {
        dd("kfjndkjfgndf");
        $fingers = $request->file('fingers');

        dd($fingers);
    }
}
