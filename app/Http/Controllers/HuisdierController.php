<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Huisdier;
use App\Models\FotosHuisdier;
use App\Models\User;
use App\Models\Soort;


class HuisdierController extends Controller
{
    public function addHuisdier(Request $request) {
        $gebruiker =  auth()->user()->email;
        $huisdier = New Huisdier;
        $huisdier->email = auth()->user()->email;
        $huisdier->naam = $request->input('naam');
        $huisdier->soort_id = $request->input('soort_id');
        $huisdier->generieke_informatie = $request->input('generieke_informatie');
        $huisdier->save();

        $request->validate([
            'foto' => 'required|image|max:2048', // Valideer het geüploade bestand als een afbeelding (maximaal 2 MB)
        ]);
    
        $foto = $request->file('foto');

        $huisdierMetID = Huisdier::all()->last();

        $huisdierMapStore = 'public/img/'. $gebruiker . '/huisdieren/'. $huisdierMetID->naam;
        $huisdierMapReference = 'storage/img/'.$gebruiker. '/huisdieren/' . $huisdierMetID->naam;


        $path = $foto->store($huisdierMapStore);
        // Voeg de foto ook toe aan de database
        $FotoHuisdier = new FotosHuisdier;
        $FotoHuisdier->huisdier_id = $huisdierMetID->huisdier_id;
        $FotoHuisdier->filename = $foto->hashName();
        $FotoHuisdier->path = $huisdierMapReference;
        $FotoHuisdier->save();

        return redirect()->back();
        // return redirect()->back();

    }

    public function voegFotoToe(Request $request, $id){
        $gebruiker =  auth()->user()->email;
        $huisdier_id = $id;
        $huisdier = Huisdier::find($huisdier_id);
        $nieuweFotoHuisdier = new FotosHuisdier;
        $nieuweFotoHuisdier->huisdier_id = $huisdier_id;

        $request->validate([
            'foto' => 'required|image|max:2048', // Valideer het geüploade bestand als een afbeelding (maximaal 2 MB)
        ]);
    
        $foto = $request->file('foto');

        $huisdierMapStore = 'public/img/'. $gebruiker . '/huisdieren/'. $huisdier->naam;
        $huisdierMapReference = 'storage/img/'.$gebruiker. '/huisdieren/' . $huisdier->naam;


        $path = $foto->store($huisdierMapStore);
        // Voeg de foto ook toe aan de database
        $nieuweFotoHuisdier->filename = $foto->hashName();
        $nieuweFotoHuisdier->path = $huisdierMapReference;
        $nieuweFotoHuisdier->save();
        return redirect()->back();

    }

    public function show(){

        $gebruiker = auth()->user();
        $gebruikerEmail = $gebruiker->email;

        $huisdieren = $gebruiker->allHuisdieren()->get();

        $soorten = Soort::all();
        
        $role = $gebruiker->role;
        


        return view('mijn-huisdieren',[
            "gebruikerEmail" => $gebruikerEmail,
            "huisdieren" => $huisdieren,
            "role" => $role,
            "soorten" => $soorten,
        ]);
    }
}
