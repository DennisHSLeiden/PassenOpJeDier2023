<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function show(){

        return view('blocked',[

        ]);
    }
}
