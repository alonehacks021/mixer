<div id="scanner" class="w-100 h-100 position-relative">
    <div id="qr-reader" class="border-0 bg-white overflow-hidden" wire:ignore></div>

    <i class="fas fa-spinner fa-spin fa-3x" id="loading" wire:loading></i>

    <div class="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" id="view">
        <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">مشاهده نتیجه</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" id="body">
                @if($this->livewire)
                    @livewire($this->livewire['component'], $this->livewire['data'])
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>
        </div>
    </div>
</div>

@push('styles')
<style>

#loading {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #FFF;
}

#qr-reader__scan_region {
    width: 100%;
    height: 100%;
    max-height: 100vh;
}

#qr-reader__scan_region video {
    width: 100%;
    height: 100%;
}

#qr-reader__dashboard {
    position: relative;
    z-index: 1049;
}

#html5-qrcode-button-camera-permission,
#html5-qrcode-button-camera-stop,
#html5-qrcode-button-camera-start,
#html5-qrcode-button-file-selection {
    color: #FFF;
    background-color: #3699FF;
    border: 0;
    border-color: #3699FF;
    border-radius: .42rem;
    padding: 10px 15px;
    margin-top: 30px;
}

#html5-qrcode-button-camera-permission {
    margin-bottom: 20px;
}

#qr-reader__dashboard_section {
    padding: 0 !important;
}

#html5-qrcode-button-camera-stop {
    display: none !important;
}

#scanner img[alt="Info icon"] {
    display: none !important;
}

#qr-reader__dashboard_section_csr {
    /* display: none !important; */
}

</style>
@endpush

@push('scripts')
<script src="{{asset('vendor/dashboard/js/html5-qrcode.min.js')}}"></script>
<script>
$(document).ready(function() {
    var isRunning = true;

    var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", {
        fps: 10,
        width: 'calc(100wh)',
        height: 'calc(100vh)',
        rememberLastUsedCamera: true,
        videoConstraints: {
            facingMode: { exact: "environment" },
            aspectRatio: $(document).height() / $(document).width()
        },
        supportedScanTypes: [
            Html5QrcodeScanType.SCAN_TYPE_CAMERA
        ]
    }, false);

    $(document).on('click', '#html5-qrcode-button-camera-start', function() {
        $('#qr-reader__dashboard').remove();
    });

    function resumeScanning() {
        setTimeout(function() {
            html5QrcodeScanner.resume();

            isRunning = true;
        }, 3000);
    }

    html5QrcodeScanner.render(function(decodedText, decodedResult) {
        html5QrcodeScanner.pause();

        const [action, rawData] = decodedText.split(':');
        const data = rawData ? rawData.split(';;') : [];

        if(action) {
            @this.decoded(action, data);
        } 
        else {
            resumeScanning();

            Swal.fire({
                icon: 'error',
                text: 'رمزینه مورد نظر معتبر نمی‌باشد!',
                showConfirmButton: false,
                timer: 3000,
            });
        }
    });

    $(window).on('scanned', function(event) {
        if((event.detail == 'LIVEWIRE') || (event.detail == 'VIEW')) {
            $('#view').modal('show');
        }
        else {
            resumeScanning();
        }
    });

    $('#view').on('hidden.bs.modal', function (event) {
        html5QrcodeScanner.resume();

        isRunning = true;
    });


    $(window).on('close-modal', function() {
        $('#view').modal('hide');
    });

    $(window).on('message', function(event) {
        Swal.fire({
            toast: true,
            position: "top",
            width: '50em',
            icon: event.detail.type,
            text: event.detail.message,
            showConfirmButton: false,
            timer: 3000
        });
    });

    $(window).on('view', function(event) {
        $('#view').find('#body').html(event.detail);
    });
});
</script>
@endpush
