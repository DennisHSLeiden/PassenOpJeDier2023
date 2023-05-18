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
        $aanvraag = New Aanvraag;
        $aanvraag->huisdier_id = $request->input('huisdier_id');
        $aanvraag->wanneer = $request->input('wanneer');
        $aanvraag->prijs = $request->input('prijs');
        $aanvraag->extra_informatie = $request->input('extra_informatie');
        $aanvraag->save();

        return redirect()->back();
    }

    public function verwijder($id) {
        $id = $id;
        $aanvraag = Aanvraag::find($id);
        $aanvraag->delete();
        return redirect()->back();
    }
}
