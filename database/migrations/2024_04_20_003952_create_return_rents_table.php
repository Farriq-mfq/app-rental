<?php

use App\Models\Car;
use App\Models\Rent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('return_rents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rent::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_tarif');
            $table->integer('durasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_rents');
    }
};
