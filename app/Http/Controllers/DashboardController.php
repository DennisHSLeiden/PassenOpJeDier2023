<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Huisdier;
use App\Models\User;
use App\Models\Reactie;


class DashboardController extends Controller
{
    public function show(){

        //om al je eigen shit te vinden
        $currentUserEmail = auth()->user()->email;
        //all je eigen huisdieren
        $huisdieren = User::where('email', $currentUserEmail)->first()->allHuisdieren;
        //alle eigen_aanvragen die je voor je huisdieren hebt
        $eigen_aanvragen = array();
        foreach ($huisdieren as $huisdier){
            $eigen_aanvragenPerDier = $huisdier->allAanvragen;
            if ($eigen_aanvragenPerDier){
                foreach ($eigen_aanvragenPerDier as $aanvraag) {
                    if($aanvraag->beschikbaar){
                        array_push($eigen_aanvragen, $aanvraag);
                    }
                }
            }
        }
        $reacties = Reactie::all();



        //alle gebuikers
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
        $huisdieren = User::where('email', $currentUserEmail)->first()->allHuisdieren;

        $role = User::where('email', $currentUserEmail)->first()->role;

    
        return view('dashboard',[
            'huisdieren'=> $huisdieren,
            'eigen_aanvragen'=> $eigen_aanvragen,
            'aanvragen' => $aanvragen,
            'reacties' => $reacties,
            'role' => $role
        ]);
    }
}
