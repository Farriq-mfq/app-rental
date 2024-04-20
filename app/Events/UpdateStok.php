<?php

namespace App\Events;

use App\Enums\UpdateStokEnum;
use App\Models\Car;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateStok
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public UpdateStokEnum $flow;
    public Car $car;
    public function __construct(Car $car, UpdateStokEnum $flow)
    {
        $this->car = $car;
        $this->flow = $flow;
    }

}
