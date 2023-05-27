<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactie extends Model
{
    use HasFactory;

    protected $table ="reactie";
    protected $primaryKey = "reactie_id";
    protected $fillable =["email", "aanvraag_id", "comment"];
    public $timestamps = false;

    public function reactieUser()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    
    public function reactieAanvraag()
    {
        return $this->belongsTo(Aanvraag::class, 'aanvraag_id', 'aanvraag_id');
    }
    
}
