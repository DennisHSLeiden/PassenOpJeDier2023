<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewOppasser extends Model
{
    protected $table = 'review_oppasser';
    protected $primaryKey = 'review_oppasser_id';
    protected $fillable =["aanvraag_id", "email_van", "email_voor", "review", "rating"];
    public $timestamps = false;
    
    public function reviewOppasserUserGegeven()
    {
        return $this->belongsTo(User::class, "email", "email_van");
    }

    public function reviewOppasserUserGekregen()
    {
        return $this->belongsTo(User::class, "email", "email_voor");
    }

    public function reviewOppasserAanvraag()
    {
        return $this->belongsTo(Aanvraag::class, "aanvraag_id", "aanvraag_id");
    }
}

