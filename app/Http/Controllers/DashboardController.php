<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Huisdier;
use App\Models\User;
use App\Models\Reactie;
use App\Models\Soort;
use App\Models\ReviewOppasser;
use App\Models\ReviewHuisdier;




class DashboardController extends Controller
{
    public function show(){

        //om al je eigen shit te vinden
        $currentUser = auth()->user();
        $currentUserEmail = $currentUser ->email;
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

        $soorten = Soort::all();
        
        $role = User::where('email', $currentUserEmail)->first()->role;
        
        $reviewsAlsHuisdierEigenaarGegeven = ReviewOppasser::where('email_van', $currentUserEmail)->get();
        $ReviewsAlsOppasGekregen = ReviewOppasser::where('email_voor', $currentUserEmail)->get();
        $ReviewsAlsOppasGegeven = ReviewHuisdier::where('email_van', $currentUserEmail)->get();
        $huisdieren = User::where('email', $currentUserEmail)->first()->allHuisdieren;

        
        //HuisdierBenodigdheden
        $eersteHuisdier = User::where('email', $currentUserEmail)->first()->allHuisdieren->first();
        if($eersteHuisdier){
            $padVoorFoto = $eersteHuisdier->allFotosHuisdier()->first()->path;
            $naamVanFoto = $eersteHuisdier->allFotosHuisdier()->first()->filename;
        }else{
            $padVoorFoto = null;
            $naamVanFoto = null;
        }


    
        return view('dashboard',[
            //Generieke Benodigdheden
            'role' => $role,
            'currentUser' =>$currentUser,
            'currentUserEmail'=> $currentUserEmail,
            // HuisdierBenodigdheden
            'eersteHuisdier'=> $eersteHuisdier,
            'padVoorFoto' => $padVoorFoto,
            'naamVanFoto' => $naamVanFoto,
            
            
            'huisdieren' => $huisdieren,
            'soorten' => $soorten,
            
            'eigen_aanvragen'=> $eigen_aanvragen,
            'reacties' => $reacties,
            'reviewsAlsHuisdierEigenaarGegeven' => $reviewsAlsHuisdierEigenaarGegeven,
            'ReviewsAlsOppasGekregen' => $ReviewsAlsOppasGekregen,
            'ReviewsAlsOppasGegeven' => $ReviewsAlsOppasGegeven,
        ]);
    }
}
