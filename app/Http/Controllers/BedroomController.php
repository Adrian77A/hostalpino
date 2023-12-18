<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BedroomController extends Controller
{
    
    public function store(Request $request){

        
        Log::info("test");

        return view('web.departament');
    }
}
