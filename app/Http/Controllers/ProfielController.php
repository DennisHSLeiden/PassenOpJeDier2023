<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ExtraUserInformation;
use App\Models\FotosHuis;



class ProfielController extends Controller
{
            
    public function show($email){
        // Controleer of de gebruiker dezelfde email heeft als de pagina
        $isOwner = ($email === auth()->user()->email);
        $profielOwner = User::where('email', $email)->first();
        $reviews = $profielOwner->allReviewsOppasserGekregen()->get();
                
    // Haal de extra gebruikersinformatie op basis van de email
        $extraUserInfo = ExtraUserInformation::where('email', $email)->first();

    // Laad de view en geef de gegevens door
        return view('profiel', compact('extraUserInfo', 'isOwner', 'profielOwner', 'reviews'));
    }

    public function edit($email){
    // Haal de extra gebruikersinformatie op basis van de email
        $extraUserInfo = ExtraUserInformation::where('email', $email)->first();
        $profielOwner = User::where('email', $email)->first();

    // Laad de view en geef de gegevens door
        return view('profielEdit', compact('extraUserInfo', 'profielOwner'));
    }


    public function update(Request $request, $email){
        // Update de velden van de bestaande instantie
        $extraUserInfo = ExtraUserInformation::where('email', $email)->first();
        $extraUserInfo->voornaam = $request->input('voornaam');
        $extraUserInfo->tussenvoegsel = $request->input('tussenvoegsel');
        $extraUserInfo->achternaam = $request->input('achternaam');
        $extraUserInfo->geboortedatum = $request->input('geboortedatum');
        $extraUserInfo->telefoonnummer = $request->input('telefoonnummer');
        $extraUserInfo->woonplaats = $request->input('woonplaats');
        $extraUserInfo->straat = $request->input('straat');
        $extraUserInfo->huisnummer = $request->input('huisnummer');
        $extraUserInfo->save();
        
        return redirect('/profiel/' . $email . '/edit');
    }
    
    public function uploadPersoonPhoto(Request $request)
    {
        $email = auth()->user()->email;
        $extraUserInfo = ExtraUserInformation::where('email', $email)->first();
    
        $request->validate([
            'photo' => 'required|image|max:2048', // Valideer het geüploade bestand als een afbeelding (maximaal 2 MB)
        ]);
    
        $photo = $request->file('photo');
    
        $PersoonMapStore = 'public/img/' . $email;
        $PersoonMapReference = 'storage/img/' . $email;
    
        $path = $photo->store($PersoonMapStore);
    
        $extraUserInfo->path = $PersoonMapReference;
        $extraUserInfo->filename = $photo->hashName();
    
        $extraUserInfo->save();
    
        return redirect('/profiel/' . $email . '/edit');
    }
    

    public function uploadWoningPhoto(Request $request){
        $email = auth()->user()->email;
        $nieuwePhotoWoning = new FotosHuis;
        $nieuwePhotoWoning->email = $email;


        $request->validate([
            'photo' => 'required|image|max:2048', // Valideer het geüploade bestand als een afbeelding (maximaal 2 MB)
        ]);
    
        $photo = $request->file('photo');

        $PersoonMapStore = 'public/img/'. $email . '/woning fotos/';
        $PersoonMapReference = 'storage/img/'.$email . '/woning fotos/';

        $path = $photo->store($PersoonMapStore);


        $nieuwePhotoWoning->path = $PersoonMapReference;
        $nieuwePhotoWoning->filename =  $photo->hashName();

        $nieuwePhotoWoning->save();

        return redirect('/profiel/' . $email . '/edit');


    }


    
}
