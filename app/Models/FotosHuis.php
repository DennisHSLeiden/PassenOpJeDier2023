<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosHuis extends Model
{
    use HasFactory;

    protected $table ="fotos_huis";
    protected $primaryKey = "foto_huis_id";
    protected $fillable =["email", "path", "filename"];
    public $timestamps = false;

    public function fotosHuisUser()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    
}
