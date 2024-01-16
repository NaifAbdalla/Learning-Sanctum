<?php

namespace App\Enum;

enum StatusEnum:int
{
    case COMPLETED = 1;
    case IN_PROGRESS = 0;

    public function label(): string
    {
        return match($this){
            self::COMPLETED => 'Completed',
            self::IN_PROGRESS => 'In Progress',
        };
    }
}
