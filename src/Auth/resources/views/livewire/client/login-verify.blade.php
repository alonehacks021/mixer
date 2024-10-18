@php
use Nahad\Dashboard\Support\Alert;
@endphp

@inject('verifyCodeService', \Nahad\Auth\Services\VerifyCodeService::class)

<div>
    @if($verifyCodeService::isValid())
    <div class="card" id="verify-form" data-remaining-time="{{$verifyCodeService::remainingTime()}}">
        <div class="card-header">
            احراز هویت دو مرحله ای
        </div>
        <div class="card-body">
            
            <div class="text-primary small mb-3">
                کد تأیید به شماره 
                <b dir="ltr">{{$verifyCodeService::mobile()}}</b>
                ارسال شد
            </div>

            @foreach (Alert::all() as $alert)
            <div class="alert alert-{{$alert['type']}} py-2">{{$alert['message']}}</div>
            @endforeach

            <form autocomplete="off" wire:submit.prevent="check">
                <div class="mb-3">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="کد اعتبار سنجی" wire:model.defer="code"/>
                        <button type="button" id="resend" class="btn btn-success" data-bs-toggle="tooltip" title="ارسال مجدد کد" wire:click="resend">
                            <i class="fas fa-redo-alt" wire:loading.remove></i>
                            <i class="fas fa-spinner fa-spin" wire:loading></i>
                        </button>
                    </div>
                    <div class="text-danger small">{{$errors->first('code')}}</div>
                </div>

                <div class="mb-3 text-center text-muted" wire:ignore>
                    <span id="minutes">00</span>:<span id="seconds">00</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <span wire:loading>
                        <i class="fas fa-spinner fa-spin"></i>
                        لطفا صبر کنید
                    </span>
                    <span wire:loading.remove>
                        <i class="fas fa-check"></i>
                        بررسی و ورود
                    </span>
                </button>
            </form> 
        </div>
    </div>
    @else
    <div class="alert alert-warning text-center">
        <i class="fas fa-exclamation-triangle fa-3x"></i>

        <p class="mt-3">
            مدت زمان مجاز احراز هویت دو مرحله ای به پایان رسید؛ مجدد وارد شوید.
        </p>

        <a class="btn btn-success" href="{{route('login')}}">
            <i class="fas fa-sign-in"></i>
            ورود
        </a>
    </div>
    @endif
</div>

@push('scripts')
<script>
$(document).ready(function() {
    var timer = null;

    var remainigTime = Number($('#verify-form').attr('data-remaining-time'));
    
    if(remainigTime > 0) {
        timerHandle(remainigTime);
    }

    $(window).on('resended', function(event) {
        var remainigTime = Number($('#verify-form').attr('data-remaining-time'));

        timerHandle(remainigTime);
    });

    function timerHandle(seconds) {
        if(seconds > 0) {
            $('#resend').addClass('disabled');
        }
        
        clearInterval(timer);
        timer = setInterval(function() {
            var min = parseInt(seconds / 60);
            var sec = seconds - (min * 60);

            $('#minutes').html((min + '').padStart(2, '0'));
            $('#seconds').html((sec + '').padStart(2, '0'));

            --seconds;

            if(seconds == -1) {
                clearInterval(timer);
                $('#resend').removeClass('disabled');
            }
        }, 1000);
    }
});
</script>
@endpush