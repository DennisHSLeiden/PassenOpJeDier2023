<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aanvraag extends Model
{
    use HasFactory;

    protected $table ="aanvraag";
    protected $primaryKey = "aanvraag_id";
    protected $fillable =["huisdier_id", "wanneer", "prijs", "extra_informatie"];
    public $timestamps = false;

    public function aanvraagHuisdier(){
        return $this->belongsTo('\App\Models\Huisdier',"huisdier_id","huisdier_id");
    }

    public function allReacties(){
        return $this->hasMany('\App\Models\Reactie',"aanvraag_id","aanvraag_id");
    }
}

