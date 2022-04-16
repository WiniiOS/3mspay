<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('home');
    }
    
    public function register(){
     return view('register');
    }

    public function form(Request $request){
        // dd($request->input('login'));
        return view('form');
    }
    
}
