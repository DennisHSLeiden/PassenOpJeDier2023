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

    public function allFotosHuis()
    {
        return $this->hasMany(FotosHuis::class, "email", "email");
    }

    public function allReacties()
    {
        return $this->hasMany(Reactie::class, "email", "email");
    }

    public function allHuisdieren()
    {
        return $this->hasMany(Huisdier::class, "email", "email");
    }

    public function allReviewsHuisdierGegeven()
    {
        return $this->hasMany(ReviewHuisdier::class, "email_van", "email");
    }

    public function allReviewsOppasserGegeven()
    {
        return $this->hasMany(ReviewOppasser::class, "email_van", "email");
    }

    public function allReviewsOppasserGekregen()
    {
        return $this->hasMany(ReviewOppasser::class, "email_voor", "email");
    }

    public function UserExtra_user_information()
    {
        return $this->belongsTo(ExtraUserInformation::class, "email", "email");
    }
}
