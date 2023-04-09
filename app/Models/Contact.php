<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'date_of_birth'
    ];

    protected $casts = [
        'date_of_birth' => 'date'
    ];

    protected $cascadeDeletes = ['phones', 'emails'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
