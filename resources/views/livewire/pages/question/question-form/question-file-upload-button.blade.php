<div
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <div class="mb-3">
        <button type="button" class="btn btn-primary btn-file">
            <i class="mdi mdi-upload mr-1"></i>
            <nobr>Загрузить ответы</nobr>
            <!-- File Input -->
            <input class="file_input_hidden" type="file" wire:model="answerImages" multiple>
        </button>

        <!-- Progress Bar -->
    </div>
    <div x-show="isUploading">
        <div class="progress progress-xl mb-3" max="100" x-bind:value="progress">
            <div :style="`width: ${progress}%;`" class="progress-bar bg-success"></div>
        </div>
    </div>
</div>
@push('styles')
    <style>

        .file_input_hidden {
            position: absolute;
            font-size: 50px;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .btn-file {
            position: relative;
            overflow: hidden;
        }
    </style>
@endpush