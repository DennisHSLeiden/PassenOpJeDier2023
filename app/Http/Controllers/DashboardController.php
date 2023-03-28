<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Huisdier;

class DashboardController extends Controller
{
    public function show(){
        $huisdieren = Huisdier::where('email', Auth::user()->email)
    };

    return view('dashboard',[
        'huisdieren'=> $huisdieren,
    ]);
}
