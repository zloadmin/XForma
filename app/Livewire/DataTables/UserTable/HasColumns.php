<?php
declare(strict_types=1);


namespace App\Livewire\DataTables\UserTable;


use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;

/**
 * @method getFilterByKey(string $string)
 */
trait HasColumns
{

    public function getIsActiveColumn()
    {
        return Column::make("Активен", "is_active")
            ->format(
                fn($value, $row, Column $column) => $row->is_active ? 'Да' : 'Нет'
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('is_active'));
    }

    public function getIdColumn()
    {
        return Column::make("ID", "id")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('id'));
    }

    public function getCreatedAtColumn()
    {
        return Column::make("Добавлен", "created_at")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('created_at'));
    }

    public function getUsernameColumn()
    {
        return Column::make("Логин", "username")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('username'));
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

    public function getAgeColumn()
    {
        return Column::make("Возраст", "age")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('age'));
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

    public function getEducationModeColumn()
    {
        return Column::make("Режим обучения", "education_mode")
            ->format(
                fn($value, $row, Column $column) => $row->education_mode->label()
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('education_mode'));
    }

    public function getRoleColumn()
    {
        return Column::make("Роль", "role")
            ->format(
                fn($value, $row, Column $column) => $row->role->label()
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('role'));
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

//        return Column::make('Студенты', 'id')
//            ->format(
//                fn($value, $row, Column $column) => $this->getStudentsHTML($row)
//            )
//            ->html();
    }
}