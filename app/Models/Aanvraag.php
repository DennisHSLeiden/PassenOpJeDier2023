<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aanvraag extends Model
{
    use HasFactory;

    protected $table ="aanvraag";

    public function aanvraagHuisdier(){
        return $this->belongsTo('\App\Models\Huisdier',"huisdier_id","huisdier_id");
    }

    public function allReacties(){
        return $this->hasMany('\App\Models\Reactie',"aanvraag_id","aanvraag_id");
    }
}

