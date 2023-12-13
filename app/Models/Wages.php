<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wages extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'amount',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

