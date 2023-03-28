<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosHuis extends Model
{
    use HasFactory;

    protected $table ="fotos_huis";

    public function fotos_huisUser(){
        return $this->belongsTo('\App\Models\User',"email","email");
    }
}
