<?php

namespace App\Listeners;

use App\Events\UpdateStok;
use App\Models\Car;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStokMobil
{
    /**
     * Create the event listener.
     */
    public function __construct(private readonly Car $car)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateStok $car): void
    {
        $currentStok = $car->car->stok;
        if ($car->flow->flow() === 'up') {
            $car->car->update([
                'stok' => $currentStok + 1
            ]);
        } else if ($car->flow->flow() === 'down') {
            $car->car->update([
                'stok' => $currentStok - 1
            ]);
        } else {
            throw new \Error("Invalid flow");
        }
    }
}
