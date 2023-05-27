<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Aanvraag;
use App\Models\Reactie;
use App\Http\Controllers\Controller;


class ReactieController extends Controller
{
    public function addReactie(Request $request, $id) {
        
        $aanvraag_id = Aanvraag::where('aanvraag_id', $id)->first()->aanvraag_id;

        $reactie = New Reactie;
        $reactie->email = auth()->user()->email;
        $reactie->aanvraag_id = $aanvraag_id;
        $reactie->comment = $request->input('comment');
        $reactie->save();
        return redirect('/dashboard');
    }

    public function Reageer(Request $request, $id)
    {
        $id = $id;
        $aanvraag_id = Reactie::where('reactie_id', $id)->first()->aanvraag_id;
        $reactie = Reactie::find($id);
    
        if ($request->input('antwoord')) {
            Reactie::where('aanvraag_id', $aanvraag_id)
                ->update(['antwoord' => false]);
    
            $reactie->antwoord = true;
            $reactie->save();
    
            $aanvraag = Aanvraag::find($aanvraag_id);
            $aanvraag->beschikbaar = false;
            $aanvraag->email_oppasser = $reactie->email;
            $aanvraag->save();

            // $andereController = new AndereController();
            // $resultaat = $andereController->methodeNaam($parameter);
    

            // return redirect()->route('stelreviewsbeschikbaar', ['id' => $aanvraag_id]);

            // return redirect('/dashboard');


            // $controller = ReviewController::beschikbaarstellen('aanvraag_id');
            // $result = $this->call(ReviewController::class, 'beschikbaarstellen', ['id' => $aanvraag_id,]);
            // return $result;
            return Redirect::route('stelreviewsbeschikbaar', ['id' => $aanvraag_id])->withMethod('POST')->withInput();
            // return redirect('/stelreviewsbeschikbaar'.'/'.$aanvraag_id);



        } else {
            $reactie->antwoord = false;
            $reactie->save();
    
            return redirect()->back();
        }
    }
    

    public function show($id) {
        $id = $id;
        $aanvraag = Aanvraag::where('aanvraag_id', $id)->first();



        return view('add-reactie',[
            "aanvraag" => $aanvraag,

        ]);
    }
}

