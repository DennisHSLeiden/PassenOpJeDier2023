<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Huisdier;
use App\Models\User;

class DashboardController extends Controller
{
    public function show(){

        //om al je eigen shit te vinden
        $currentUserEmail = auth()->user()->email;

        //all je eigen huisdieren
        $huisdieren = User::where('email', $currentUserEmail)->first()->allHuisdieren;

        //alle andere huisdieren
        $not_huisdieren = User::where('email', '!=' ,$currentUserEmail)->first()->allHuisdieren;

        //alle eigen_aanvragen die je voor je huisdieren hebt
        $eigen_aanvragen = array();
        foreach ($huisdieren as $huisdier){
            $eigen_aanvragenPerDier = $huisdier->allAanvragen;
            if ($eigen_aanvragenPerDier){
                foreach ($eigen_aanvragenPerDier as $aanvraag) {
                    array_push($eigen_aanvragen, $aanvraag);
                }
            }
        }

        // Alle aanvragen, behalve die van jezelf, zodat je kan browsen
        $aanvragen = array();
        foreach ($not_huisdieren as $huisdier){
            $aanvragenPerDier = $huisdier->allAanvragen;
            if ($aanvragenPerDier){
                foreach ($aanvragenPerDier as $aanvraag) {
                    array_push($aanvragen, $aanvraag);
                }
            }
        }
    
        return view('dashboard',[
            'huisdieren'=> $huisdieren,
            'eigen_aanvragen'=> $eigen_aanvragen,
            'aanvragen' => $aanvragen
        ]);
    }
}
