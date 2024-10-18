<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ورود به داشبرد مدیریتی</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/vendor/dashboard/fontawesome/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/vendor/dashboard/css/adminlte.min.css">
        <link rel="stylesheet" href="/vendor/dashboard/css/custom-login.css">

        @livewireStyles()
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                @lang('dashboard::titles.login_page_title')
            </div>
            <!-- /.login-logo -->
            
            @livewire('auth::dashboard.user-verify', [
                'hashUserId' => $hash_code
            ])

        </div>
        <!-- /.login-box -->

        @livewireScripts()
    </body>
</html>

