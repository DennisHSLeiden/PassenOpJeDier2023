<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewOppasser;
use App\Models\ReviewHuisdier;
use App\Models\Aanvraag;
use App\Models\User;

class ReviewController extends Controller
{
    public function beschikbaarstellen(Request $request, $id)
    {
        $id = $id;
        // Stap 1: Ophalen van de aanvraag en de betrokken gebruikers
        $aanvraag = Aanvraag::find($id); // Veronderstel dat je een 'Aanvraag' model hebt
        $oppas = User::where('email', $aanvraag->email_oppasser)->first();
        $aanvrager = User::where('email', $aanvraag->aanvraagHuisdier()->first()->huisdierUser()->first()->email)->first();
        // dd($aanvraag->aanvraagHuisdier()->first()->huisdierUser()->first()->email);
        
        // Stap 2: Aanmaken van nieuwe review records
        $reviewOppasser = new ReviewOppasser();
        $reviewOppasser->aanvraag_id = $id;
        $reviewOppasser->email_van = $aanvrager->email;
        $reviewOppasser->email_voor = $oppas->email;
        // Voeg andere review-gerelateerde gegevens toe aan het model
        $reviewOppasser->save();
        
        $reviewHuisdier = new ReviewHuisdier();
        $reviewHuisdier->aanvraag_id = $id;
        $reviewHuisdier->email_van = $oppas->email;
        $reviewHuisdier->huisdier_id = $aanvraag->huisdier_id;
        // Voeg andere review-gerelateerde gegevens toe aan het model
        $reviewHuisdier->save();
        
        // Voer verdere acties uit, zoals het tonen van een succesbericht of het uitvoeren van andere logica

        // Redirect naar een relevante pagina
        return redirect('/dashboard');

    }

    public function showHuisdier($id){
        $id = $id;
        $reviewHuisdier = reviewHuisdier::find($id);
        return view('review-huisdier',[
            "reviewHuisdier" => $reviewHuisdier,

        ]);
    }

    public function reviewHuisdierGeven(request $request, $id){
        $id = $id;
        $reviewHuisdier = ReviewHuisdier::find($id);
        $reviewHuisdier->review = $request->input('review');
        $reviewHuisdier->rating = $request->input('rating');
        $reviewHuisdier->save();

        return redirect('/dashboard');
    }


    public function showOppasser($id){
        $id = $id;
        $reviewOppasser = ReviewOppasser::find($id);
        return view('review-oppasser',[
            "reviewOppasser" => $reviewOppasser,

        ]);
    }

    public function reviewOppasserGeven(request $request, $id){
        $id = $id;
        $reviewOppasser = ReviewOppasser::find($id);
        $reviewOppasser->review = $request->input('review');
        $reviewOppasser->rating = $request->input('rating');
        $reviewOppasser->save();

        return redirect('/dashboard');
    }

}
