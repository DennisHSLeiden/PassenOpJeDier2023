<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddAanvraagController extends Controller
{
    public function addAanvraag(Request $request) {
        
        DB::insert('insert into aanvraag (huisdier_id, wanneer, prijs, extra_informatie) values (?, ?, ?, ?)',
        [$request->input('huisdier_id'), $request->input('wanneer'), $request->input('prijs'), $request->input('extra_informatie')]);

        return redirect()->back();

    }
}
