@php
use Nahad\Dashboard\Support\Alert;
@endphp

<div class="card">
    <div class="card-header">
        بازنشانی رمز عبور
    </div>
    <div class="card-body">
        @foreach (Alert::all() as $alert)
        <p class="text-center text-{{$alert['type']}}">{{$alert['message']}}</p>
        @endforeach

        @if($level == 1)
        <form autocomplete="off" wire:submit.prevent="checkMobile">
            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="شماره موبایل" wire:model.defer="mobile"/>
                    <span class="input-group-text">
                        <i class="fas fa-mobile-alt"></i>
                    </span>
                    <div class="invalid-feedback">{{$errors->first('mobile')}}</div>
                </div>
            </div>

            <div class="mb-3">
                <img class="img-thumbnail mb-1 w-50" src="{{captcha_src('flat')}}"/>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="کد تصویر امنیتی" wire:model.defer="captcha"/>
                    <span class="input-group-text">
                        <i class="fas fa-barcode"></i>
                    </span>
                    <div class="invalid-feedback">{{$errors->first('captcha')}}</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                بررسی
            </button>
        </form>
        @elseif($level == 2)
        <form autocomplete="off" wire:submit.prevent="checkCode">
            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="کد اعتبارسنجی" wire:model.defer="code"/>
                    <button type="button" class="btn btn-success" wire:click="resendCode">
                        <i class="fas fa-spinner fa-spin" wire:loading wire:target="resendCode"></i>
                        ارسال مجدد
                    </button>
                    <div class="invalid-feedback">{{$errors->first('code')}}</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                ادامه
            </button>
        </form>
        @elseif($level == 3)
        <form autocomplete="off" wire:submit.prevent="setPassword">
            <div class="alert alert-warning">
                رمزعبور می بایست شامل حداقل یک حرف بزرگ و یک حرف كوچک انگليسی و حداقل یک عدد و حداقل شامل یکی از کاراکتر های @ _ باشد
            </div>

            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمزعبور جدید" wire:model.defer="password"/>
                    <span class="input-group-text">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="تکرار رمزعبور جدید" wire:model.defer="password_confirmation"/>
                    <span class="input-group-text">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    <div class="invalid-feedback">{{$errors->first('password_confirmation')}}</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                بازنشانی
            </button>
        </form>
        @else
        <div class="text-center">
            <i class="fas fa-check-circle text-success fa-5x mb-5 mt-3"></i>
            <p class="text-muted">
                در حال انتقال به سایت، لطفا صبر کنید ...
            </p>
        </div>
        @endif
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
</div>