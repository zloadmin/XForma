<?php
declare(strict_types=1);


namespace App\Livewire\DataTables\TeacherTable;


use App\Models\Teacher;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;

/**
 * @method getFilterByKey(string $string)
 */
trait HasColumns
{


    public function getIdColumn()
    {
        return Column::make("ID", "id")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('id'));
    }

    public function getFullNameColumn()
    {
        return Column::make("ФИО", "full_name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('full_name'));
    }

    public function getEmailColumn()
    {
        return Column::make("Логин", "email")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('email'));
    }

    public function getPasswordUnsafeColumn()
    {
        return Column::make("Пароль", "password_unsafe")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('password_unsafe'));
    }

    public function getCompanyNameColumn()
    {
        return Column::make("Организация", "company_name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('company_name'));
    }

    public function getJobTitleColumn()
    {
        return Column::make("Должность", "job_title")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('job_title'));
    }

    public function getNoteColumn()
    {
        return Column::make("Примечание", "note");
    }

    public function getActionColumn()
    {
        return Column::make('', 'id')
            ->format(
                fn($value, $row, Column $column) => $this->getActionHTML($row)
            )
            ->html();
    }

    public function getStudentsColumn()
    {
        return CountColumn::make('Студенты')
            ->setDataSource('students')
            ->sortable();
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