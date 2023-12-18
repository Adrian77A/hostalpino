<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index(){

        return view('web.contact');
    }

    public function store(Request $request){

        $date_current = Carbon::now();
        $request->validate([
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:comments,email',
            'description' => 'required|max:255',
        ]);

        Comment::create([
            'name' =>  $request->name, 
            'title' =>  $request->title, 
            'email' =>  $request->email, 
            'description'=>  $request->description, 
            'date' =>  $date_current
        ]);
        
        return redirect()->route('home')->with('success','Comentario guardadó exitosamente!.');
    }
}
