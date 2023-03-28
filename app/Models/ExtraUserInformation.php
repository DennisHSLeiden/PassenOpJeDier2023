<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraUserInformation extends Model
{
    use HasFactory;

    protected $table ="extra_user_information";

    public function extra_user_informationUser(){
        return $this->belongsTo('\App\Models\User',"email","email");
    }
}
