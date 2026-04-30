<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'schedule_id', 'status', 'booking_date'
    ];

    // Relasi (BelongsTo): Booking ini milik user siapa?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi (BelongsTo): Booking ini untuk jadwal mana?
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}