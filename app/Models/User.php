<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table ="users";


    public function allFotosWoning(){
        return $this->hasMany('\App\Models\FotosHuis',"email","email");
        //return $this->hasMany('\App\Models\Foto',"foreignKey in woning","waar hij naar refereert in user")
    }

    public function allReacties(){
        return $this->hasMany('\App\Models\Reactie',"email","email");
    }

    public function allHuisdieren(){
        return $this->hasMany('\App\Models\Huisdier',"email","email");
    }

    public function allReviews(){
        return $this->hasMany('\App\Models\Review',"email","email");
    }

    public function UserExtra_user_information(){
        return $this->belongsTo('\App\Models\ExtraUserInformation',"email","email");
    }
}
