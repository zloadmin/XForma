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
<!--- Режим Field --->
<div class="form-group mb-2">
    <label for="education_mode">Режим</label>
    <select class="form-control @error('education_mode') is-invalid @enderror" wire:model="education_mode">
        <option value=""></option>
        @foreach(\App\Enums\User\UserEducationMode::cases() as $mode)
            <option value="{{ $mode->value }}">{{ $mode->label() }}</option>
        @endforeach
    </select>
    @error('education_mode')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Билеты Field --->
<div class="form-group">
    <label for="ticket_ids">Билеты</label>
    <select class="form-control @error('ticket_ids') is-invalid @enderror" wire:model="ticket_ids"
            multiple {{ $isDisableTickets ? 'disabled'  : ''}}>
        @foreach($tickets as $ticket)
            <option value="{{ $ticket->id }}">
                Билет # {{ $ticket->id }}
                Задачи
                @foreach($ticket->tasks as $task)
                    {{ $task->id }}
                @endforeach
            </option>
        @endforeach
    </select>
    @error('ticket_ids')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Случайность Field --->
<div class="form-group mb-2">
    <label for="random_mode">Случайность</label>
    <select class="form-control @error('random_mode') is-invalid @enderror" wire:model.live="random_mode">
        <option value=""></option>
        @foreach(\App\Enums\User\UserRandomMode::cases() as $case)
            <option value="{{ $case->value }}">{{ $case->label() }}</option>
        @endforeach
    </select>
    @error('random_mode')
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
<!--- Преподаватель Field --->
<div class="form-group">
    <label for="teacher_id">Преподаватель</label>
    <select class="form-control @error('teacher_id') is-invalid @enderror" wire:model="teacher_id">
        <option value=""></option>
        @foreach($teachers as $id => $full_name)
            <option value="{{ $id }}" >{{ $full_name }}</option>
        @endforeach
    </select>
    @error('teacher_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>