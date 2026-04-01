<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;


enum CapacitacionStatus : string  implements HasLabel
{
    case IP = 'In Progress';
    case A = 'Approved';
    case SR = 'Approved By State Representative';
    case GA = 'General Approval';

    public function getLabel(): ?string
    {
        // Return the value you want shown in the UI
        return match ($this) {
            self::IP => 'In Progress',
            self::A => 'Approved',
            self::SR => 'Approved By State Representative',
            self::GA => 'General Approval',
        };
    }

}