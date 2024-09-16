<?php
declare(strict_types=1);


namespace App\Enums\Traits;


trait SelectFilterOptionable
{
    static function getSelectFilterOptions() : array
    {
        $options[''] = 'Все';
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }

}