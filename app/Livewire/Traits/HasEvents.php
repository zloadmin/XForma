<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


trait HasEvents
{
    private const EVENT_HIDE_MODAL = 'hideModal';
    private const EVENT_REFRESH_TEACHERS_TABLE = 'refreshTeachersTable';

    private function hideModal(): void
    {
        $this->dispatch(self::EVENT_HIDE_MODAL);
    }
    private function refreshTeachersTable(): void
    {
        $this->dispatch(self::EVENT_REFRESH_TEACHERS_TABLE);
    }


}