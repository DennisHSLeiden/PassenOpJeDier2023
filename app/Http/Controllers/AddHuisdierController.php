<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddHuisdierController extends Controller
{
    public function addHuisdier(Request $request) {
        
        DB::insert('insert into huisdier (email, naam, soort, generieke_informatie) values (?, ?, ?, ?)',
        [auth()->user()->email, $request->input('naam'), $request->input('soort'), $request->input('generieke_informatie')]);

        return redirect()->back();

    }
}
