@php
use Nahad\Dashboard\Support\Alert;
@endphp

@extends(config('auth.complete_profile_layout'))

@section('container')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/auth/md-date-picker/jquery.md.bootstrap.datetimepicker.style.css')}}"/>
    @livewireStyles()
@endpush

<div class="row">
    <div class="col-12 col-md-6">
        <div class="row h-100">
            <div class="col-5 col-md-6 col-lg-5 mx-auto py-5 justify-content-center align-self-center">
                <img class="img-fluid" src="{{asset('vendor/auth/images/reset-password.png')}}"/>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-3">
        @livewire('auth::client.account-update', [
            'user' => $user
        ])
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{asset('vendor/auth/md-date-picker/jquery.md.bootstrap.datetimepicker.js')}}"></script>
    @livewireScripts()
@endpush