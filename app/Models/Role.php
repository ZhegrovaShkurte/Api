<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasApiTokens, HasFactory, Notifiable ;

    protected $fillable = ['name'];
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
