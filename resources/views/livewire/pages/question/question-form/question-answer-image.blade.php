<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                <input class="@error('isRight') is-invalid @enderror"
                       type="radio"
                       value="{{ $key }}"
                       wire:model="isRight" id="isRight.{{ $key }}">
            </div>
            <div class="col-auto">
                <label class="form-check-label" for="isRight.{{ $key }}">
                    @isset($file->id)
                        <img src="{{ $file->getUrl() }}" alt="image" class="img-fluid rounded" width="200"/>
                    @else
                        <img src="{{ $file->temporaryUrl() }}" alt="image" class="img-fluid rounded" width="200"/>
                    @endisset
                </label>
            </div>
            <div class="col">
                <a href="javascript:void(0);" class="text-muted fw-bold">
                    {{ substr($file->getClientOriginalName(), 0, 30) }}
                </a>
                <p class="mb-0">
                    {{ number_format($file->getSize() / 100000, 2)  }} MB
                </p>
            </div>
            <div class="col-auto">
                @isset($file->id)
                    <!-- Button -->
                    <a wire:click.prevent="deleteExistFile({{ $file->id }})" class="btn btn-link btn-lg text-muted">
                        <i class="dripicons-cross"></i>
                    </a>
                @else
                    <!-- Button -->
                    <a wire:click.prevent="deleteAnswerImage({{ $key }})" class="btn btn-link btn-lg text-muted">
                        <i class="dripicons-cross"></i>
                    </a>
                @endisset
            </div>
        </div>
    </div>
</div>
