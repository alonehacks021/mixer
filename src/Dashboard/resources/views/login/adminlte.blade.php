@php
use Nahad\Dashboard\Support\Alert;
@endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ورود به پیشخوان مدیریتی</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/vendor/dashboard/fontawesome/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/vendor/dashboard/css/adminlte.min.css">
        <link rel="stylesheet" href="/vendor/dashboard/css/custom-login.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                ورود به پیشخوان
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">برای دسترسی به پیشخوان وارد شوید</p>

                    @foreach (Alert::all() as $alert)
                    <p class="text-center text-{{$alert['type']}}">{{$alert['message']}}</p>
                    @endforeach

                    <form autocomplete="off" method="post">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" placeholder="نام کاربری" value="{{old('username')}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger small mt-1">{{$errors->first('username')}}</div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="رمزعبور">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger small mt-1">{{$errors->first('password')}}</div>
                        </div>
                        
                        <img class="img-fluid mb-1 rounded w-75" src="{{captcha_src('flat')}}" id="captcha"/>
                        <i class="fas fa-redo text-white bg-dark p-2 rounded" onclick="document.getElementById('captcha').src = '{{url('/captcha/flat')}}?' + Math.random();"></i>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" name="captcha" placeholder="عبارت امنیتی">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-robot"></span>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger small">{{$errors->first('captcha')}}</p>
                        <div class="row">
                            <div class="col-8">
                                <!-- <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">
                                        مرا به خاطر بسپار
                                    </label>
                                </div> -->
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <!-- /.social-auth-links -->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
    </body>
</html>

