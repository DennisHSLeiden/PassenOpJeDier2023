<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soort extends Model
{
    use HasFactory;

    protected $table ="soorten";

    public function allHuisdieren()
    {
        return $this->hasMany(Huisdier::class, 'soort_id', 'soort_id');
    }
    
}
