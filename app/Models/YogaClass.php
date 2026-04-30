<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YogaClass extends Model
{
    // Arahkan secara manual ke tabel 'classes' karena nama modelnya beda
    protected $table = 'classes'; 

    protected $fillable = [
        'name', 'price', 'description'
    ];

    // Relasi: Satu jenis Kelas bisa memiliki banyak Jadwal (One-to-Many)
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'class_id');
    }
}