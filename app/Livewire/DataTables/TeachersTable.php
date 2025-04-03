<?php

namespace App\Livewire\DataTables;

use App\Livewire\DataTables\Traits\HasColumns;
use App\Livewire\DataTables\Traits\HasFilters;
use App\Livewire\Traits\HasEvents;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class TeachersTable extends DataTableComponent
{
    use HasFilters;
    use HasColumns;
    use HasEvents;

//    protected $model = Teacher::class;
    public function builder(): Builder
    {
        return Teacher::query()
            ->withCount('students')
            ->with(['students']);
    }


    public function mount()
    {

    }

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
            $this->getFullNameFilter(),
            $this->getEmailFilter(),
            $this->getPasswordUnsafeFilter(),
            $this->getCompanyNameFilter(),
            $this->getJobTitleFilter(),
        ];
    }

    public function columns(): array
    {
        return [
            $this->getIdColumn(),
            $this->getFullNameColumn(),
            $this->getEmailColumn(),
            $this->getPasswordUnsafeColumn(),
            $this->getCompanyNameColumn(),
            $this->getJobTitleColumn(),
            $this->getStudentsColumn(),
            $this->getNoteColumn(),
            $this->getActionColumn()
        ];
    }

    public function getStudentsHTML(Teacher $teacher): string
    {
        $href = route('students-page', ['teacher_id' => $teacher->id]);
        $count = $teacher->students->count();

        return sprintf('<a href="%s" wire:navigate>%d</a>', $href, $count);
    }

    #[On(self::EVENT_REFRESH_TEACHERS_TABLE)]
    public function refreshTable(): void
    {
        $this->mount();
    }
    public function deleteTeacher($id): void
    {
        $teacher = Teacher::find($id);
        $teacher?->delete();
        $this->mount();
    }

    public function getActionHTML(Teacher $teacher)
    {

        $click = "\$dispatch('showModal', {data: {'alias' : 'modals.teacher.edit-teacher-modal','params' :{'teacherId': $teacher->id}}})";
        $editRoute = '';
        return <<<HTML

           <nobr>
            <button type="button"  wire:click="$click" class="btn btn-link action-icon" >
                <i class="mdi mdi-pencil"></i>
            </button>
                    
                <a href="#" class="action-icon"
                        wire:click.prevent="deleteTeacher($teacher->id)"
                        wire:confirm="Удалить преподавателя?"
                >
                    <i class="mdi mdi-delete"></i>
                </a>
            </nobr>
                   
        HTML;
    }

}
