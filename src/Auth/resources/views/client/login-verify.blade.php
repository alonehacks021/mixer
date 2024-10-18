<!doctype html>

<html class="h-100">
    <head>
        <title>تایید دو مرحله ای</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('vendor/auth/bootstrap-5.0.2/css/bootstrap.rtl.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/auth/fontawesome/css/all.min.css')}}"/>
        <style>
        @font-face {
            font-family: vazir-regular;
            src: url(/vendor/auth/fonts/Vazir-Regular-FD-WOL.ttf);
        }

        *, .popover{
            font-family: vazir-regular;
        }
        </style>

        @livewireStyles
    </head>
    <body class="h-100" dir="rtl">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-6 col-sm-6 col-md-4 py-2">
                    <img class="img-fluid" src="{{asset('vendor/auth/images/reset-password.png')}}"/>
                </div>
                <div class="col-12 col-sm-6 col-md-4 offset-md-2 pb-2 justify-content-center align-self-center">
                    @php
                    $logo = env('APP_BIG_LOGO');
                    @endphp
                    
                    @if($logo) 
                    <div class="d-block text-center">
                        <img src="{{$logo}}" class="w-25"/>
                    </div>
                    @endif

                    <p class="text-center text-muted">{{env('APP_NAME')}}</p>

                    @livewire('auth::client.login-verify')
                </div>
            </div>
        </div>

        @livewireScripts
        <script src="{{asset('vendor/auth/js/jquery-3.7.0.min.js')}}"></script>
        @stack('scripts')
    </body>
</html>