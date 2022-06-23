<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZohoController extends Controller
{
    public function hadnel(Request $request){
        $data = $request->all();
        return $data;
    }
    //
}
