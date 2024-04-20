<?php

namespace App\Enums;

enum UpdateStokEnum: string
{
    case UP = 'up';
    case DOWN = 'down';

    public function flow(): string
    {
        return match ($this) {
            UpdateStokEnum::UP => 'up',
            UpdateStokEnum::DOWN => 'down',
            default => 'down'
        };
    }
}
