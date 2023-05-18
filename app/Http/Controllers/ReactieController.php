<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Aanvraag;
use App\Models\Reactie;


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
    
        if ($request->input('antwoord')) {
            Reactie::where('aanvraag_id', $aanvraag_id)
                ->update(['antwoord' => false]);
    
            $reactie = Reactie::find($id);
            $reactie->antwoord = true;
            $reactie->save();
    
            $aanvraag = Aanvraag::find($aanvraag_id);
            $aanvraag->beschikbaar = false;
            $aanvraag->save();
    
            return redirect('/dashboard');
        } else {
            $reactie = Reactie::find($id);
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

