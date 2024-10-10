<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
    <div class="card" style="height: 160px">
        <div class="card-body">
            <div class="row align-items-center justify-content-between">
                <div class="col-1">
                    <input class="@error('isRight') is-invalid @enderror"
                           type="radio"
                           value="{{ $key }}"
                           wire:model="isRight" id="isRight.{{ $key }}">
                </div>
                <div class="col-9">
                    <label class="form-check-label float-left" for="isRight.{{ $key }}">
                        @isset($file->id)
                            <img src="{{ $file->getUrl() }}" alt="image" class="img-fluid rounded" width="200" style="max-height: 109px"/>
                        @else
                            <img src="{{ $file->temporaryUrl() }}" alt="image" class="img-fluid rounded" width="200" style="max-height: 109px"/>
                        @endisset
                    </label>
                </div>
{{--                <div class="col">--}}
{{--                    <a href="javascript:void(0);" class="text-muted fw-bold">--}}
{{--                        {{ substr($file->getClientOriginalName(), 0, 30) }}--}}
{{--                    </a>--}}
{{--                    <p class="mb-0">--}}
{{--                        {{ number_format($file->getSize() / 100000, 2)  }} MB--}}
{{--                    </p>--}}
{{--                </div>--}}
                <div class="col-2">
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

</div>