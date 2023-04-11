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


        DB::insert('insert into reactie (email, aanvraag_id, comment) values (?, ?, ?)',
        [auth()->user()->email, $aanvraag_id, $request->input('comment'),]);

        return redirect('/dashboard');
    }

    public function Reageer(Request $request, $id){
        $id = $id;
        $aanvraag_id = Reactie::where('reactie_id', $id)->first()->aanvraag_id;
        $alleAanvragen = Aanvraag::all();
        if ($request->input('antwoord')){
            foreach ($alleAanvragen as $aanvraag) {
                DB::update('update reactie set antwoord = ? where aanvraag_id = ?', [FALSE ,$aanvraag_id]);
            }
            DB::update('update reactie set antwoord = ? where reactie_id = ?', [TRUE ,$id]);
            DB::update('update aanvraag set beschikbaar = ? where aanvraag_id = ?', [FALSE, $aanvraag_id]);
            return redirect('/dashboard');
        } else {
            DB::update('update reactie set antwoord = ? where reactie_id = ?', [FALSE ,$id]);
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

