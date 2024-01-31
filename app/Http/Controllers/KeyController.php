<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Bedroom;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;



class KeyController extends Controller
{
    public function index(){
        // $all_comment = Comment::status()->get();
        $array_order_data = Banner::status()->orderBy('order')->get();
        // $get_hotel_pino = Hotel::whereName('Pino suares #562')->with('bedroom')->get()->first();

        $get_products = Product::Where('status','Disponible')->get();

        return view('web.index',  ['banners'  => $array_order_data, 'get_products' => $get_products ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:contacts,email',
            'description' => 'required|max:255',
            'phone' => 'required|numeric|min:9',
            'date' => 'required|date',
        ]);

        $CONTACT = Contact::create([
            'name' =>  $request->name, 
            'email' =>  $request->email, 
            'description'=>  $request->description, 
            'phone'=>  $request->phone, 
            'date' =>   $request->date,
        ]);
        
        return redirect()->route('home')->with('success','Contactó guardadó exitosamente!.');
    }
}
