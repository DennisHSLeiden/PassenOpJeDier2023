<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Huisdier;
use App\Models\User;

class DashboardController extends Controller
{
    public function show(){
        $currentUserEmail = auth()->user()->email;
        $huisdieren = User::where('email', $currentUserEmail)->first()->allHuisdieren;
    
        return view('dashboard',[
            'huisdieren'=> $huisdieren,
        ]);
    }
}
