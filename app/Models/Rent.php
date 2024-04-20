<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kode',
        'mulai',
        'no_ktp',
        'selesai',
        'car_id'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
