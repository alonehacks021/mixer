@php
use Nahad\Dashboard\Support\{PageInfo, Alert};

$user = \Request::user();
@endphp

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{env('APP_NAME')}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/vendor/dashboard/fontawesome/css/all.min.css">
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="{{asset('vendor/dashboard/bootstrap-rtl/bootstrap.min.css')}}">
        <!-- Custom style for RTL -->
        <link rel="stylesheet" href="/vendor/dashboard/css/custom.css">

        @stack('styles')
    </head>
    <body>
        <div class="container-fluid px-0">
            @yield('container')
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="/vendor/dashboard/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/vendor/dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/dashboard/sweetalert/sweetalert2.js"></script>

        <script>
        $(document).ready(function() {
            $.ajaxSetup({
                data: {
                    '_token': '{{csrf_token()}}'
                }
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>

        @stack('scripts')
    </body>
</html>

