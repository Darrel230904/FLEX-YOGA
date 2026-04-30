<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'class_id', 'trainer_id', 'date', 'start_time', 'end_time', 'quota'
    ];

    // Relasi (BelongsTo): Jadwal ini milik kelas apa?
    public function yogaClass()
    {
        return $this->belongsTo(YogaClass::class, 'class_id');
    }

    // Relasi (BelongsTo): Jadwal ini diajar oleh trainer siapa?
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    // Relasi (HasMany): Jadwal ini punya berapa booking?
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}