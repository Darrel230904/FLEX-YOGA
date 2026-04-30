<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name', 'bio', 'photo_url'
    ];

    // Relasi: Satu Trainer bisa mengajar di banyak Jadwal (One-to-Many)
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}