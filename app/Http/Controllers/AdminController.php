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
        $alleAanvragen = Aanvraag::all();

        return view('admin',[
            'users' => $alleNonAdminUsers,
            'aanvragen' => $alleAanvragen
        ]);
    }

    public function verwijder($id) {
        $id = $id;
        DB::delete('delete from aanvraag where aanvraag_id = ?', [$id]);
        // $aanvraag = Aanvraag::where('aanvraag_id', $id)->first();
        return redirect()->back();

    }

    public function blokkeer($email) {
        $email = $email;
        $account = User::where('email', $email)->first();
        if($account->blocked){
            DB::update('update users set blocked = ? where email = ?', [FALSE ,$email]);
        } else {
            DB::update('update users set blocked = ? where email = ?', [TRUE ,$email]);

        }
        return redirect()->back();
    }
}
