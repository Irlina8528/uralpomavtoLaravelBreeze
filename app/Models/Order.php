<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id_client',
        'city_from',
        'city_into',
        'liquid',
        'fragile',
        'loose',
        'dangerous',
        'declared_cost',
        'delivery_date',
        'pallet',
        'protective_packaging',
        'carton',
        'cost',
        'id_driver',
        'id_transport',
        'id_status',
        'id_manager',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_client');
    }
    
    public function drivers()
    {
        return $this->belongsTo(Driver::class, 'id_driver');
    }
    
    public function transports()
    {
        return $this->belongsTo(Transport::class, 'id_transport');
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
    
    public function manager()
    {
        return $this->belongsTo(User::class, 'id_manager');
    }

    public function cargo()
    {
        return $this->hasMany(Cargo::class, 'id_order');
    }
}
