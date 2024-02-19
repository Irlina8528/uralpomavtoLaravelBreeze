<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'id_usertype',
        'patronymic',
        'surname',
        'name',
        'phone',
        'email',
        'password',
        'usertype',
        'passport_series',
        'passport_number',
        'address',
        'id_company'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
    public function userType()
    {
        return $this->belongsTo(UserType::class, 'id_usertype');
    }
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
        'password' => 'hashed',
        'passport_series' => 'encrypted',
        'passport_number' => 'encrypted',
    ];
}
