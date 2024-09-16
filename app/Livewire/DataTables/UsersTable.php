<?php

namespace App\Livewire\DataTables;

use App\Livewire\DataTables\UserTable\HasColumns;
use App\Livewire\DataTables\UserTable\HasFilters;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UsersTable extends DataTableComponent
{
    use HasFilters;
    use HasColumns;

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setToolBarDisabled();
//        $this->setCurrentlyReorderingStatus(false);
        $this->setLayout('components.layouts.app-full');
    }

    public function filters(): array
    {
        return [
            $this->getIdFilter(),
            $this->getUsernameFilter(),
            $this->getFullNameFilter(),
            $this->getAgeFilter(),
            $this->getCompanyNameFilter(),
            $this->getJobTitleFilter(),
            $this->getEducationModeFilter(),
            $this->getIsActiveFilter(),
            $this->getRoleFilter(),
            $this->getCreatedAtFilter(),
        ];
    }

    public function columns(): array
    {
        return [
            $this->getIdColumn(),
            $this->getUsernameColumn(),
            $this->getFullNameColumn(),
            $this->getAgeColumn(),
            $this->getCompanyNameColumn(),
            $this->getJobTitleColumn(),
            $this->getEducationModeColumn(),
            $this->getIsActiveColumn(),
            $this->getRoleColumn(),
            $this->getCreatedAtColumn(),
            $this->getActionColumn()
        ];
    }

    public function getActionHTML(User $user)
    {
        $editRoute = route('edit-user-page', $user);
        return <<<HTML

            <a href="{$editRoute}" class="action-icon" wire:navigate>
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <!--
                    <a href="#" class="action-icon"
                            wire:click.prevent="delete({{ $user->id }})"
                            wire:confirm="Удалить пользователя?"
                    >
                        <i class="mdi mdi-delete"></i>
                    </a>
                    -->
HTML;

    }
}
