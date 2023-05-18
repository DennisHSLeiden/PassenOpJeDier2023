<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Huisdier;


class AddHuisdierController extends Controller
{
    public function addHuisdier(Request $request) {
        $huisdier = New Huisdier;
        $huisdier->email = auth()->user()->email;
        $huisdier->naam = $request->input('naam');
        $huisdier->soort_id = $request->input('soort_id');
        $huisdier->generieke_informatie = $request->input('generieke_informatie');
        $huisdier->save();

        return redirect()->back();

    }
}
