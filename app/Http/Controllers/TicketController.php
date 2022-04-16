<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function form(Request $request){
        return view('form');
    }
    
}
