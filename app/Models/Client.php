<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function dogs() {
        return $this->hasMany(Dog::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'birthdate', 'user_id'];
}
