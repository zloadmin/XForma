<div class="col-md-12">
    <a href="{{ route('create-user-page') }}" class="btn btn-danger mb-3" wire:navigate>
        <i class="mdi mdi-plus-circle mr-2"></i>
        Создать
    </a>
    <livewire:data-tables.users-table />
</div>
