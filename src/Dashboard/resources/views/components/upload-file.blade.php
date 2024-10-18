<div class="card upload-file" data-model="{{$model}}" data-wire-id="{{$wire_id}}" wire:ignore.self>
    <div class="card-body">
        @isset($label)
        <p class="card-text" style="font-weight: 700">
            {{$label}}
            <br/>
            @isset($hint)
            <small class="card-text text-muted" style="font-weight: 300">{{$hint}}</small>
            @endisset
        </p>
        @endisset

        <input type="file" class="d-none file-entity"/>

        <div class="file-area text-center text-muted pt-5">
            <div class="align-middle">
                <i class="fas fa-upload fa-3x"></i>
                <br/>
                <span class="align-middle small">یک فایل انتخاب کنید یا اینجا رها کنید</span>
            </div>
        </div>

        <div class="progress invisible mt-3" wire:ignore.self>
            <div class="progress-bar progress-bar-striped progress-bar-animated" wire:ignore.self></div>
        </div>

        @error($model)
        <div class="text-danger small mt-1">{{$errors->first($model)}}</div>
        @enderror
        
    </div>
</div>

@once
@push('styles')
<style>
.upload-file .progress {
    height: 10px;
}

.upload-file .file-area {
    transition: .5s;
    height: 200px;
    cursor: pointer;
    border: 3px dashed #dee2e6;
    border-radius: 10px;
}

.upload-file .file-area:hover {
    transition: .5s;
    border-color: #000;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    function getComponent(element) {
        return $(element).closest('.upload-file');
    }

    function getModel(element) {
        return getComponent(element).attr('data-model');
    }
   
    function getComponentId(element) {
        return getComponent(element).attr('data-wire-id');
    }

    function getProgressBar(element) {
        return getComponent(element).find('.progress-bar');
    }

    function progressStart(pb) {
        pb.parent().removeClass('invisible');

        pb.css('width', '0%')
            .removeClass('bg-success bg-danger')
            .addClass('bg-primary');
    }

    function progressSuccess(pb) {
        pb.removeClass('bg-primary bg-danger')
            .addClass('bg-success');
    }

    function progressError(pb) {
        pb.removeClass('bg-primary bg-success')
            .addClass('bg-danger');
    }

    $(document).on('click', '.file-area', function(event) {
        $(this).prev().trigger('click');
    });

    $(document).on('change', '.file-entity', function(event) {
        var file = $(this).prop('files')[0];
        uploadFile(this, file);
    });

    $(document).on('dragover', '.file-area', function(event) {
        event.preventDefault();
    });

    $(document).on('drop', '.file-area', function(event) {
        event.preventDefault();

        var file = null;

        if (event.originalEvent.dataTransfer.items) {
            [...event.originalEvent.dataTransfer.items].forEach((item, i) => {
                // If dropped items aren't files, reject them
                if (item.kind === "file") {
                    file = item.getAsFile();
                    return null;
                }
            });
        } else {
            file = event.originalEvent.dataTransfer.files[0];
        }

        uploadFile(this, file);
    });

    function uploadFile(element, file) {
        if(file == null) {
            return;
        }

        var progressBar = getProgressBar(element);
        var progress = progressBar.parent();
        var componentId = getComponentId(element);
        var model = getModel(element);

        progressStart(progressBar);

        Livewire.find(componentId).upload(model, file, function() {
            progressSuccess(progressBar);
        }, function() {
            progressError(progressBar);
        }, function(event) {
            progressBar.css('width', event.detail.progress + '%');
        });
    }
});
</script>
@endpush
@endonce