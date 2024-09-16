<?php
declare(strict_types=1);


namespace App\Livewire\DataTables\UserTable;


use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRole;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

trait HasFilters
{

    public function getIsActiveFilter()
    {
        return SelectFilter::make('Активен', 'is_active')->options([
            ''  => 'Все',
            '1' => 'Да',
            '0' => 'Нет',
        ])->filter(function (Builder $builder, string $value) {
            if ($value === '1') {
                $builder->where('users.is_active', true);
            } elseif ($value === '0') {
                $builder->where('users.is_active', false);
            }
        })->hiddenFromAll();
    }

    public function getEducationModeFilter()
    {

        return SelectFilter::make('Режим обучения', 'education_mode')
            ->options(UserEducationMode::getSelectFilterOptions())
            ->filter(function (Builder $builder, string $value) {
                if ($value) {
                    $builder->where('users.education_mode', $value);
                }
            })->hiddenFromAll();
    }

    public function getRoleFilter()
    {

        return SelectFilter::make('Роль', 'role')
            ->options(UserRole::getSelectFilterOptions())
            ->filter(function (Builder $builder, string $value) {
                if ($value) {
                    $builder->where('users.role', $value);
                }
            })->hiddenFromAll();
    }

    public function getIdFilter()
    {
        return TextFilter::make('ID', 'id')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.id', '=', $value);
            })
            ->hiddenFromAll();
    }

    public function getCreatedAtFilter()
    {
        return DateRangeFilter::make('Добавлен', 'created_at')
            ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                $builder
                    ->whereDate('users.created_at', '>=', $dateRange['minDate']) // minDate is the start date selected
                    ->whereDate('users.created_at', '<=', $dateRange['maxDate']); // maxDate is the end date selected
            })
            ->hiddenFromAll();
    }

    public function getUsernameFilter()
    {
        return TextFilter::make('Логин', 'username')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.username', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getFullNameFilter()
    {
        return TextFilter::make('ФИО', 'full_name')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.full_name', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getAgeFilter()
    {
        return TextFilter::make('Возраст', 'age')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.age', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getCompanyNameFilter()
    {
        return TextFilter::make('Организация', 'company_name')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.company_name', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getJobTitleFilter()
    {
        return TextFilter::make('Должность', 'job_title')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.job_title', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }
}