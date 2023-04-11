<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddHuisdierController extends Controller
{
    public function addHuisdier(Request $request) {
        
        DB::insert('insert into huisdier (email, naam, soort_id, generieke_informatie) values (?, ?, ?, ?)',
        [auth()->user()->email, $request->input('naam'), $request->input('soort_id'), $request->input('generieke_informatie')]);

        return redirect()->back();

    }
}
