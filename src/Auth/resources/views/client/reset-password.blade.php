<!doctype html>

<html class="h-100">
    <head>
        <title>بازنشانی رمزعبور</title>
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
                <div class="col-12 col-sm-6 col-md-4 p-5">
                    <img class="img-fluid" src="{{asset('vendor/auth/images/reset-password.png')}}"/>
                </div>
                <div class="col-12 col-sm-6 col-md-4 offset-md-2  justify-content-center align-self-center">
                    @livewire('auth::client.reset-password')
                </div>
            </div>
        </div>

        @livewireScripts

        <script>
            window.addEventListener('password-reseted', function() {
                setTimeout(function() {
                    location.href = '/';
                }, 5000);
            });
        </script>
    </body>
</html>