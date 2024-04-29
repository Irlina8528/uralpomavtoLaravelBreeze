<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'drivers';

    protected $fillable = [
        'name',
        'patronymic',
        'surname',
        'phone',
        'driver_license_number',
        'passport_series',
        'passport_number',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_driver');
    }


    protected $casts = [
        'passport_series' => 'encrypted',
        'passport_number' => 'encrypted',
        'driver_license_number' => 'encrypted',
        'deleted_at' => 'datetime',
    ];
}
