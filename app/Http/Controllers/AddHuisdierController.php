<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AddHuisdierController extends Controller
{
    public function addHuisdier(Request $request) {
        print "helloo";
        // $servername = "localhost";
        // $username = "PassenOpJeDier2023";
        // $password = "12345";
        // $dbname = "PassenOpJeDier2023";

        // $conn = mysqli_connect($servername, $username, $password, $dbname);

        // if (mysqli_connect_errno()) {
        //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
        //     exit();
        // }

        DB::insert('insert into huisdier (email, naam, soort, generieke_informatie) values (?, ?, ?, ?)',
        [auth()->user()->email, $request->input('naam'), $request->input('soort'), $request->input('generieke_informatie')]);

        // $stmt = $conn->prepare("INSERT INTO huisdier (email, naam, soort, generieke_informatie) VALUES (?, ?, ?, ?)");
        // $stmt->bind_param("ssss", $email, $naam, $soort, $generieke_informatie);

        // $email = 'test@test.com'; //Auth::user('email')
        // $name = $request->input('naam');
        // $soort = $request->input('soort');
        // $generieke_informatie = $request->input('generieke_informatie');

        // $stmt->execute();

        // return redirect()->back();

    }
}
