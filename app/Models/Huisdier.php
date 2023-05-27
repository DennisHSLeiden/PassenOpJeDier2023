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

    public function huisdierUser()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    
    public function huisdierSoort()
    {
        return $this->belongsTo(Soort::class, 'soort_id', 'soort_id');
    }
    
    public function allReviewsHuisdier()
    {
        return $this->hasMany(ReviewHuisdier::class, 'huisdier_id', 'huisdier_id');
    }
    
    public function allAanvragen()
    {
        return $this->hasMany(Aanvraag::class, 'huisdier_id', 'huisdier_id');
    }
    
    public function allFotosHuisdier()
    {
        return $this->hasMany(FotosHuisdier::class, 'huisdier_id', 'huisdier_id');
    }
    
}

