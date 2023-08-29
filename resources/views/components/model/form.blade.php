<div class="modal fade" id="{{ $modelId }}" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-{{ $size != '' ? $size : 'lg';}}" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="card-body pb-3 pt-0">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>