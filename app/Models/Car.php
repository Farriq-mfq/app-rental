<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['merk', 'model', 'tarif', 'n_plat', 'foto', 'stok'];
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }
}
