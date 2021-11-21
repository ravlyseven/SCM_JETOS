<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function data(Request $request)
    {
        if($request->kedalaman >= 25){
            if($request->sdm == "harus"){
                return view('resultGPR');
            }
            else{
                return view('resultTespit');
            }
        }

        elseif($request->kedalaman >= 8){
            if($request->jenisUtilitasTanah == "ya"){
                if($request->sdm == "harus"){
                    return view('resultPCL');
                }
                else{
                    return view('resultTespit');
                }
            }
            else{
                if($request->sdm == "harus"){
                    return view('resultGPR');
                }
                else{
                    return view('resultTespit');
                }
            }
        }

        else{
            return view('resultTespit');
        }

    }
}
