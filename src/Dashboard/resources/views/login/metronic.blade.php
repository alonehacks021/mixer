@php
use Nahad\Dashboard\Support\Alert;
@endphp

<!DOCTYPE html>
<!--
Template Name: مترونیک - Bootstrap 4 HTML, React, آنگولار 9 & VueJS Admin داشبورد تم
Author: Keenتمs
Website: http://www.keenthemes.com/
تماس با ما: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
خرید: https://www.rtl-theme.com/metronic-admin-html-template/
Renew Support: https://www.rtl-theme.com/metronic-admin-html-template/
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html direction="rtl" dir="rtl" style="direction: rtl">
    <!--begin::Head-->
    <head>
        <base href="../../../../">
        <meta charset="utf-8" />
        <title>{{env('APP_NAME')}}</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{asset('vendor/dashboard/metronic/css/pages/login/classic/login-2.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global تم Styles(used by all pages)-->
        <link href="{{asset('vendor/dashboard/metronic/plugins/global/plugins.bundle.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('vendor/dashboard/metronic/css/style.bundle.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
        <!--end::Global تم Styles-->
        <!--begin::Layout تمs(used by all pages)-->
        <link href="{{asset('vendor/dashboard/metronic/css/themes/layout/header/base/light.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('vendor/dashboard/metronic/css/themes/layout/header/menu/light.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
        <!--end::Layout تمs-->
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
                <!--begin::Aside-->
                <div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
                    <!--begin: Aside Container-->
                    <div class="d-flex flex-row-fluid flex-column justify-content-between">
                        <!--begin::Aside body-->
                        <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                            <a href="http://nahad.ir" class="mb-15 text-center">
                                <img src="{{asset('vendor/dashboard/img/logo.png')}}" class="max-h-75px" alt="" />
                                <p class="text-muted mt-2">نهاد نمایندگی مقام معظم رهبری در دانشگاه ها</p>
                            </a>
                            <!--begin::Signin-->
                            <div class="login-form login-signin">
                                <div class="text-center mb-10 mb-lg-20">
                                    <h2 class="font-weight-bold">ورود</h2>
                                    <p class="text-muted font-weight-bold">نام کاربری و رمز عبور خود را وارد کنید</p>
                                </div>

                                @foreach (Alert::all() as $alert)
                    <p class="text-center text-{{$alert['type']}}">{{$alert['message']}}</p>
                    @endforeach

                                <!--begin::Form-->
                                <form autocomplete="off" novalidate="novalidate" id="kt_login_signin_form" method="post">
                                    @csrf 

                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="نام کاربری" name="username" autocomplete="off"
                                            value="{{old('username')}}"/>
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="کلمه عبور" name="password" />
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <img class="w-50" src="{{captcha_src('flat')}}" id="captcha"/>
                                        <i class="fas fa-redo text-white bg-dark p-2 rounded" onclick="$('#captcha').attr('src', '{{url('/captcha/flat')}}?' + Math.random());"></i>
                                        <input class="form-control h-auto border-0 px-0 placeholder-dark-75 mt-2 @error('captcha') is-invalid @enderror" type="text" placeholder="عبارت امنیتی" name="captcha" />
                                        <p class="invalid-feedback">{{$errors->first('captcha')}}</p>
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                        <!-- <div class="checkbox-inline">
                                            <label class="checkbox checkbox-outline m-0 text-muted">
                                                <input type="checkbox" name="remember" />
                                                <span></span>مرا به خاطر بسپار</label>
                                        </div> -->
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                                        <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">ورود</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Signin-->
                        </div>
                        <!--end::Aside body-->
                        <!--begin: Aside footer for desktop-->
                        <div class="d-flex flex-column-auto justify-content-between mt-15">
                            <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2"> &copy; نهاد نمایندگی مقام معظم رهبری در دانشگاه ها 2023 - 1402 </div>
                        </div>
                        <!--end: Aside footer for desktop-->
                    </div>
                    <!--end: Aside Container-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url({{asset('vendor/dashboard/metronic/media/bg/bg-4.jpg')}});">
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-lg-center">
                        <div class="d-flex flex-column justify-content-center">
                            <h3 class="display-3 font-weight-bold my-7 text-white">{{env('APP_NAME')}}</h3>
                            <p class="font-weight-bold font-size-lg text-white opacity-80"></p>
                        </div>
                    </div>
                    <!--end::Content body-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1400
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <!--end::Global Config-->
<!--begin::Global تم Bundle(used by all pages)-->
    	    	   <script src="{{asset('vendor/dashboard/metronic/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
		    	   <script src="{{asset('vendor/dashboard/metronic/js/scripts.bundle.js?v=7.0.6')}}"></script>
				<!--end::Global تم Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                            <script src="{{asset('vendor/dashboard/metronic/js/pages/custom/login/login-general.js?v=7.0.6')}}"></script>
                        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>