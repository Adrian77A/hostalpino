<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Bedroom;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;



class KeyController extends Controller
{
    public function index(){
        $all_comment = Comment::status()->get();
        $array_order_data = Banner::status()->orderBy('order')->get();
        $get_hotel_pino = Hotel::whereName('Pino suares #562')->with('bedroom')->get()->first();
        
        return view('web.index',  ['all_comment' => $all_comment, 'banners'  => $array_order_data, 'data_pino' => $get_hotel_pino ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:contacts,email',
            'description' => 'required|max:255',
            'phone' => 'required|numeric|min:9',
            'date' => 'required|date',
        ]);

        Contact::create([
            'name' =>  $request->name, 
            'email' =>  $request->email, 
            'description'=>  $request->description, 
            'phone'=>  $request->phone, 
            'date' =>   $request->date,
        ]);

        return redirect()->route('home')->with('success','Contactó guardadó exitosamente!.');
    }
}
