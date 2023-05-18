<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huisdier extends Model
{
    use HasFactory;

    protected $table ="huisdier";
    protected $primaryKey = "huisdier_id";
    protected $fillable =["email", "naam", "soort_id", "generieke_informatie"];
    public $timestamps = false;

    public function huisdierUser(){
        return $this->belongsTo('\App\Models\User',"email","email");
    }

    public function huisdierSoort(){
        return $this->belongsTo('\App\Models\Soort',"soort_id","soort_id");
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

