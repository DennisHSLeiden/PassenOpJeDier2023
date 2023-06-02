<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Aanvraag;
use App\Models\User;



class AanvraagController extends Controller
{

    public function show(){

                //om al je eigen shit te vinden
        $currentUser = auth()->user();
        $currentUserEmail = $currentUser ->email;
        //all je eigen huisdieren
        $huisdieren = User::where('email', $currentUserEmail)->first()->allHuisdieren;
        //alle gebruikers
        $gebruikers = User::all();
        // Alle aanvragen, behalve die van jezelf, zodat je kan browsen
        $aanvragen = array();
        foreach ($gebruikers as $gebruiker){
            if ($gebruiker->email !== $currentUserEmail){
                $huisdieren_gebruiker = $gebruiker->allHuisdieren;
                if ($huisdieren_gebruiker){
                    foreach ($huisdieren_gebruiker as $huisdier){
                        $aanvragen_huisdier = $huisdier->allAanvragen;
                        if ($aanvragen_huisdier){
                            foreach ($aanvragen_huisdier as $aanvraag){
                                if ($aanvraag->beschikbaar){
                                    array_push($aanvragen, $aanvraag);
                                }
                            }
                        }
                    }
                }
            }
        }
        return view('aanvragen-zoeken',[
            "aanvragen" => $aanvragen,
        ]);
    }

    
    public function show_details($id){
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
