<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'id_client',
        'id_order',
        'stars',
        'comment'
    ];

    public function feedbackUser()
    {
        return $this->belongsTo(User::class, 'id_client');
    }
    public function feedbackOrder()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
