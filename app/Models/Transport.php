<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'transports';

    protected $fillable = [
        'mark',
        'state_number',
        'length',
        'width',
        'height',
        'tonnage',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_transport');
    }

    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
