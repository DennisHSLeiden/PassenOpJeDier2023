<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huisdier extends Model
{
    use HasFactory;

    protected $table ="huisdier";

    public function huisdierUser(){
        return $this->belongsTo('\App\Models\User',"email","email");
    }

    public function allReviews(){
        return $this->hasMany('\App\Models\Review',"huisdier_id","huisdier_id");
    }

    public function allAanvragen(){
        return $this->hasMany('\App\Models\Aanvraag',"huisdier_id","huisdier_id");
    }

    public function allFotosHuisdier(){
        return $this->hasMany('\App\Models\FotosHuisdier',"huisdier_id","huisdier_id");
    }
}

