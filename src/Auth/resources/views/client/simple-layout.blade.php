@php
use Nahad\Dashboard\Support\Alert;
@endphp

<!doctype html>

<html class="h-100">
    <head>
        <title>حساب کاربری</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('vendor/auth/bootstrap-rtl/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/auth/fontawesome/css/all.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/auth/css/fonts.css')}}"/>
        <style>
        *, .popover{
            font-family: IRANYekanXFaNum;
        }
        </style>
        @stack('styles')
    </head>
    <body dir="rtl">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col">
                    @foreach (Alert::all() as $alert)
                    <div class="alert alert-{{$alert['type']}}">
                        {{$alert['message']}}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    @endforeach
                </div>
            </div>
            @yield('container')
        </div>

        <script src="{{asset('vendor/auth/js/jquery-3.7.0.min.js')}}"></script>
        <script src="{{asset('vendor/auth/popper/popper.min.js')}}"></script>
        <script src="{{asset('vendor/auth/bootstrap-rtl/bootstrap.min.js')}}"></script>
        @stack('scripts')
    </body>
</html>