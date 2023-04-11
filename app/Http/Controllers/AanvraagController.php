<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Aanvraag;


class AanvraagController extends Controller
{
    public function show($id){
        $id = $id;
        $aanvraag = Aanvraag::where("aanvraag_id", $id)->first();
        $reacties = $aanvraag->allReacties;
        $huisdier = $aanvraag->aanvraagHuisdier;

        return view('aanvraag-details',[
            "reacties" => $reacties,
            "huisdier" => $huisdier,
        ]);
    }


    public function addAanvraag(Request $request) {
        
        DB::insert('insert into aanvraag (huisdier_id, wanneer, prijs, extra_informatie) values (?, ?, ?, ?)',
        [$request->input('huisdier_id'), $request->input('wanneer'), $request->input('prijs'), $request->input('extra_informatie')]);

        return redirect()->back();

    }
}
