<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(){

            return view('list');


    }
    public function create(Request $request){


            return $request;

    }
}
