<form wire:submit.prevent="saveUser">

    <!--- Логин Field --->
    <div class="form-group">
        <label for="username">Логин</label>
        <input class="form-control @error('username') is-invalid @enderror" type="text" wire:model="username">
        @error('username')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- ФИО Field --->
    <div class="form-group">
        <label for="full_name">ФИО</label>
        <input class="form-control @error('full_name') is-invalid @enderror" type="text" wire:model="full_name">
        @error('full_name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Возраст Field --->
    <div class="form-group">
        <label for="age">Возраст</label>
        <input class="form-control @error('age') is-invalid @enderror" type="number" min="1" max="100" wire:model="age">
        @error('age')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Организация Field --->
    <div class="form-group">
        <label for="company_name">Организация</label>
        <input class="form-control @error('company_name') is-invalid @enderror" type="text" wire:model="company_name">
        @error('company_name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Должность Field --->
    <div class="form-group">
        <label for="job_title">Должность</label>
        <input class="form-control @error('job_title') is-invalid @enderror" type="text" wire:model="job_title">
        @error('job_title')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Примечание Field --->
    <div class="form-group">
        <label for="note">Примечание</label>
        <textarea class="form-control @error('note') is-invalid @enderror" wire:model="note"></textarea>
        @error('note')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Режим обучения Field --->
    <div class="form-group">
        <label for="education_mode">Режим обучения</label>
        <select class="form-control @error('education_mode') is-invalid @enderror" wire:model="education_mode">
            <option value=""></option>
            @foreach(\App\Enums\User\UserEducationMode::cases() as $case)
                <option value="{{ $case->value }}">{{ $case->label() }}</option>
            @endforeach
        </select>
        @error('education_mode')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Активный Field --->
    <div class="form-group">
        <label for="is_active">Активный</label>
        <select class="form-control @error('is_active') is-invalid @enderror" wire:model="is_active">
            <option></option>
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select>
        @error('is_active')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Роль Field --->
    <div class="form-group">
        <label for="role">Роль</label>
        <select class="form-control @error('role') is-invalid @enderror" wire:model="role">
            <option></option>
            @foreach(\App\Enums\User\UserRole::cases() as $case)
                <option value="{{ $case->value }}" >{{ $case->label() }}</option>
            @endforeach
        </select>
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Пароль Field --->
    <div class="form-group">
        <label for="password">Пароль</label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" wire:model="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Пароль Field --->
    <div class="form-group">
        <label for="password_confirmation">Подтверждение пароля</label>
        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" wire:model="password_confirmation">
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="saveUser">
        <div wire:loading.delay wire:target="saveUser">
            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
            Загрузка...
        </div>
        <div wire:loading.delay.remove wire:target="saveUser">
            Сохранить
        </div>
    </button>
</form>