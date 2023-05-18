<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aanvraag;
use DB;


class AdminController extends Controller
{
    public function show(){
        $alleNonAdminUsers = User::all();
        $alleAanvragen = Aanvraag::where('beschikbaar', true)->get();

        return view('admin',[
            'users' => $alleNonAdminUsers,
            'aanvragen' => $alleAanvragen
        ]);
    }

    public function blokkeer($email) {
        $email = $email;
        $account = User::where('email', $email)->first();
        if($account->blocked){
            $account->blocked = false;
        } else {
            $account->blocked = true;
        }
        $account->save();
        return redirect()->back();
    }
}
