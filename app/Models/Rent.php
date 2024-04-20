<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kode',
        'mulai',
        'no_ktp',
        'selesai',
        'car_id',
        'user_id'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function returnRent(): HasOne
    {
        return $this->hasOne(ReturnRent::class);
    }
}
