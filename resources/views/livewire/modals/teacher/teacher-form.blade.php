<!--- ФИО Field --->
<div class="form-group mb-2">
    <label for="full_name">ФИО</label>
    <input class="form-control @error('full_name') is-invalid @enderror" type="text" wire:model="full_name">
    @error('full_name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Email Field --->
<div class="form-group mb-2">
    <label for="email">Email</label>
    <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model="email">
    @error('email')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Пароль Field --->
<div class="form-group mb-2">
    <label for="password_unsafe">Пароль</label>
    <input class="form-control @error('password_unsafe') is-invalid @enderror" type="text" wire:model="password_unsafe">
    @error('password_unsafe')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Компания Field --->
<div class="form-group mb-2">
    <label for="company_name">Компания</label>
    <input class="form-control @error('company_name') is-invalid @enderror" type="text" wire:model="company_name">
    @error('company_name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Должность Field --->
<div class="form-group mb-2">
    <label for="job_title">Должность</label>
    <input class="form-control @error('job_title') is-invalid @enderror" type="text" wire:model="job_title">
    @error('job_title')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Ученики Field --->
<div class="form-group mb-2">
    <label for="student_ids">Ученики</label>
    <select class="form-control @error('student_ids') is-invalid @enderror" wire:model="student_ids" multiple>
        @foreach($students as $studentId => $studentFullName)
            <option value="{{ $studentId }}">{{ $studentFullName }}</option>
        @endforeach
    </select>
    @error('student_ids')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Примечание Field --->
<div class="form-group mb-2">
    <label for="note">Примечание</label>
    <textarea class="form-control @error('note') is-invalid @enderror" wire:model="note"></textarea>
    @error('note')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>