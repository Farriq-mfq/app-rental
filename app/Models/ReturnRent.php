<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReturnRent extends Model
{
    use HasFactory;
    protected $fillable = ['total_tarif', 'durasi', 'rent_id'];

    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }
}
