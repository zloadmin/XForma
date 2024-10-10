<button class="btn btn-primary float-right mb-3" wire:loading.attr="disabled" wire:target="saveQuestion">
    <div wire:loading.delay wire:target="saveQuestion">
        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
        Загрузка...
    </div>
    <div wire:loading.delay.remove wire:target="saveQuestion">
        Сохранить
    </div>
</button>