<?php

namespace App\Livewire\DataTables;

use App\Livewire\DataTables\Traits\HasColumns;
use App\Livewire\DataTables\Traits\HasFilters;
use App\Livewire\Traits\HasEvents;
use App\Models\Result;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class ResultsTable extends DataTableComponent
{


//    protected $model = Result::class;
    public function builder(): Builder
    {
        return Result::query()
            ->select(['results.id', 'results.created_at', 'results.education_mode', 'results.is_success', 'user.full_name'])
            ->with(['resultTasks', 'user', 'ticket']);
    }


    public function mount()
    {

    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setToolBarDisabled();
        $this->setLayout('components.layouts.app-full');
    }


    public function columns(): array
    {
        return [
            $this->getDateColumn(),
            $this->getFullNameColumn(),
            $this->getTicketIdsColumn(),
            $this->getEducationModeColumn(),
            $this->getIsSuccessColumn(),
            $this->getActionColumn(),
        ];
    }

    public function getDateColumn()
    {
        return Column::make("Дата и время сессии", "created_at")
            ->sortable()
            ->format(
                fn($value, $row, Column $column) => $row->created_at->format('d.m.Y H-i')
            )
            ->secondaryHeader($this->getFilterByKey('created_at'));
    }

    public function getFullNameColumn()
    {
        return Column::make("ФИО", "user.full_name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('user_full_name'));
    }

    public function getEducationModeColumn()
    {
        return Column::make("Режим", "education_mode")
            ->format(
                fn($value, $row, Column $column) => $row->education_mode->label()
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('education_mode'));
    }

    public function getIsSuccessColumn()
    {
        return Column::make("Результат", "is_success")
            ->format(
                fn($value, $row, Column $column) => $row->is_success ? 'Сдал' : 'Не сдал'
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('is_success'));
    }

    public function getTicketIdsColumn()
    {
        return Column::make("№Задания")
            ->label(
                function ($row, Column $column) {

                    return implode(',', $row->resultTasks->pluck('task_id')->toArray());
                }
            );
    }

    public function getTaskIdsColumn()
    {
        return Column::make("№Билета", "ticket_id")
            ->secondaryHeader($this->getFilterByKey('ticket_id'));
    }

    public function getActionColumn()
    {
        return Column::make('', 'id')
            ->format(
                fn($value, $row, Column $column) => $this->getActionHTML($row)
            )
            ->html();
    }

    public function getActionHTML(Result $result): string
    {

        $click = "\$dispatch('showModal', {data: {'alias' : 'modals.result.result-details-modal','params' :{'resultId': $result->id}}})";
        $editRoute = '';
        return <<<HTML
            <button type="button"  wire:click="$click" class="btn btn-link action-icon" >
                <i class="mdi mdi-table-account"></i>
            </button>        
        HTML;
    }

}
