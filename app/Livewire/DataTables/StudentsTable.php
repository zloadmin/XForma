<?php

namespace App\Livewire\DataTables;

use App\Livewire\DataTables\Traits\HasColumns;
use App\Livewire\DataTables\Traits\HasFilters;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class StudentsTable extends DataTableComponent
{
    use HasFilters;
    use HasColumns;
    use HasEvents;
    public int|null $current_teacher_id = null;
//    protected $model = Student::class;

    public function builder(): Builder
    {
        return Student::query()
            ->with(['tickets', 'teacher']);
    }


    public function mount(int $teacher_id = null)
    {
        $this->current_teacher_id = $teacher_id;
        if($this->current_teacher_id) {
            $this->setFilter('teacher_id', $this->current_teacher_id);
        }

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
            $this->getEducationModeFilter(),
            $this->getRandomModeFilter(),
            $this->getTeacherFilter(),
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
            $this->getEducationModeColumn(),
            $this->getTicketsColumn(),
            $this->getRandomModeColumn(),
            $this->getNoteColumn(),
            $this->getTeacherColumn(),
            $this->getActionColumn()
        ];
    }


    #[On(self::EVENT_REFRESH_STUDENTS_TABLE)]
    public function refreshTable(): void
    {
        $this->mount($this->current_teacher_id);
    }

    public function deleteStudent($id): void
    {
        $student = Student::find($id);
        $student?->delete();
        $this->refreshTable();
    }

    public function getActionHTML(Student $student): string
    {

        $click = "\$dispatch('showModal', {data: {'alias' : 'modals.student.edit-student-modal','params' :{'studentId': $student->id}}})";
        $editRoute = '';
        return <<<HTML

           <nobr>
            <button type="button"  wire:click="$click" class="btn btn-link action-icon" >
                <i class="mdi mdi-pencil"></i>
            </button>
                    
                <a href="#" class="action-icon"
                        wire:click.prevent="deleteStudent($student->id)"
                        wire:confirm="Удалить ученика?"
                >
                    <i class="mdi mdi-delete"></i>
                </a>
            </nobr>
                   
        HTML;
    }


}
