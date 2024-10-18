@extends('dashboard::simple-layout')

@section('container')

<div class="row mx-0">
    <div class="col px-0">
        @livewire('scanner')

        <div id="qr-overlay">
            <a href="{{($url = \URL::previous()) == request()->fullUrl() ? '/' : $url}}">
                <i class="fas fa-arrow-left fa-3x"></i>
            </a>

            <div id="description" class="position-absolute w-100 text-center py-5">
                برای انجام عملیات مورد نظر، رمزینه خود را پویش نمایید!
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    @livewireStyles
<style>
    #qr-overlay {
        position: absolute;
        width: 100vw;
        height: 100vh;
        top: 0;
        left: 0;
    }

    #qr-overlay a {
        position: relative;
        display: inline-block;
        top: 20px;
        right: calc(100vw - 70px);
        color: #FFF;
    }

    @keyframes wait {
        0% {
            border-top-color: rgba(0, 0, 0, 0.0);
        }
        50% {
            border-top-color: #3699FF;
        }
        100% {
            border-top-color: rgba(0, 0, 0, 0.0);
        }
    }

    #description {
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: #FFF;
        border-top: 5px solid rgba(0, 0, 0, 0.0);
        animation: wait 1s linear infinite;
    }
</style>

@endpush

@push('scripts')
    @livewireScripts
@endpush