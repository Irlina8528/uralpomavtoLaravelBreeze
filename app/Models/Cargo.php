<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';

    protected $fillable = [
        'id_order',
        'length',
        'width',
        'height',
        'weight',
        'quantity',
    ];

    
    public function order()
{
    return $this->belongsTo(Order::class, 'id_order');
}

}
