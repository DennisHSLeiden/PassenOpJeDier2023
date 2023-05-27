<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewHuisdier extends Model
{
    protected $table ="review_huisdier";
    protected $primaryKey = 'review_huisdier_id';
    protected $fillable =["aanvraag_id", "email_van", "huisdier_id", "review", "rating"];
    public $timestamps = false;

    public function reviewHuisdierUserGegeven()
    {
        return $this->belongsTo(User::class, "email", "email_van");
    }
    
    public function reviewHuisdierHuisdier()
    {
        return $this->belongsTo(User::class, "huisdier_id", "huisdier_id");
    }

    public function reviewHuisdierAanvraag()
    {
        return $this->belongsTo(Aanvraag::class, "aanvraag_id", "aanvraag_id");
    }
}