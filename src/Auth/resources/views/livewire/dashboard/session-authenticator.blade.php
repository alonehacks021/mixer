<div class="container-fluid px-0" wire:poll.3s>
    <div class="row">
        <div class="col">
            <h5 class="font-weight-bolder">
                نهاد همراه
            </h5>
            <p class="text-secondary">
                با استفاده از برنامه احراز هویت نهاد همراه، کد QR را اسکن کنید.
            </p>
            
        </div>
    </div>

    <div class="row">
        <div class="col text-center" wire:ignore>
            <img class="imgimg-fluid" src="{{$image}}"/>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="alert alert-warning">
                <i class="fas fa-info-circle fa-lg mr-1"></i>
                اگر در استفاده از کد QR مشکل دارید،
                رمز عبور خود را وارد نمایید
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <form autocomplete="off" wire:submit.prevent="check">
                <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.defer="password" placeholder="رمزعبور"/>
                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                </div>

                <x-dashboard::livewire.buttons.button
                    icon="fas fa-fingerprint"
                    btn="primary"
                    click="check">
                    بررسی رمزعبور
                </x-dashboard::livewire.buttons.button>
            </form>
        </div>
    </div>
</div>
