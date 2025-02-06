<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use Messagable;

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

    public function ordersUser()
    {
        return $this->hasMany(Order::class, 'id_client');
    }

    public function ordersManager()
    {
        return $this->hasMany(Order::class, 'id_manager');
    }
    public function UserFeedback()
    {
        return $this->hasMany(Feedback::class, 'id_client');
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
