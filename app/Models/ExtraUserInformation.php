<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraUserInformation extends Model
{
    use HasFactory;

    protected $table ="extra_user_information";
    protected $primaryKey = "extra_user_information_id";
    protected $fillable =["email", "voornaam", "tussenvoegsel", "achternaam", "geboortedatum", "path", "filename", "telefoonnummer", "woonplaats", "straat", "huisnummer"];
    public $timestamps = false;

    public function extraUserInformation()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    
}
