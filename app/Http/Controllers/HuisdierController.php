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

        $huisdierMapStore = 'public/img/huisdier_' . $huisdierMetID->huisdier_id . '_' . $huisdierMetID->naam;
        $huisdierMapReference = 'storage/img/huisdier_' . $huisdierMetID->huisdier_id . '_' . $huisdierMetID->naam;


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

    public function show($email){

        $gebruiker = User::where('email', $email)->first();

        $huisdieren = $gebruiker->allHuisdieren()->get();

        $soorten = Soort::all();
        
        $role = $gebruiker->role;
        


        return view('mijn-huisdieren',[
            "huisdieren" => $huisdieren,
            "role" => $role,
            "soorten" => $soorten,
        ]);
    }
}
