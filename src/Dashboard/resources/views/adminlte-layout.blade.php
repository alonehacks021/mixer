@php
use Nahad\Dashboard\Support\{PageInfo, Alert};
use Nahad\Dashboard\Services\BookmarkService;
use Nahad\Notification\Services\NotificationService;

$currentPageBookmarked = BookmarkService::currentPageBookmarked();
$user = \Request::user();
@endphp

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf" content="{{csrf_token()}}"/>
        <meta name="page_title" content="{{get_page_title()}}"/>
        <title>{{env('APP_NAME')}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/vendor/dashboard/fontawesome/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/vendor/dashboard/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/vendor/dashboard/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="{{asset('vendor/dashboard/bootstrap-rtl/bootstrap.min.css')}}">
        <!-- Custom style for RTL -->
        <link rel="stylesheet" href="/vendor/dashboard/css/custom.css?v5">

        @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark {{config('dashboard.adminlte.main_header')}}">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    @foreach (trans_array('dashboard::layout.header_menu') as $item)
                        @if ($item)
                            @isset($item['policy'])
                                @can($item['policy']['method'], $item['policy']['model'])
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="{{$item['url']}}" class="nav-link text-white">{{$item['title']}}</a>
                                </li>
                                @endcan
                            @else
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{$item['url']}}" class="nav-link text-white">{{$item['title']}}</a>
                            </li>    
                            @endisset
                        @endif
                    @endforeach
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav mr-auto-navbav">
                    <li class="nav-item">
                        <a class="nav-link text-warning" 
                            data-id="{{$currentPageBookmarked->id ?? null}}"
                            data-type="{{$currentPageBookmarked ? 'remove' : 'add'}}"
                            href="#" id="add-bookmark" data-toggle="tooltip" title="افزودن این صفحه به نشانه گزاری ها">
                        	<i class="{{$currentPageBookmarked ? 'fas' : 'far'}} fa-star"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" data-widget="control-sidebar" data-slide="true" 
                            href="/dashboard/auth/logout">
                        	<i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/dashboard" class="brand-link {{config('dashboard.adminlte.sidebar_header')}}">
                <img src="{{env('APP_LOGO', '/vendor/dashboard/img/logo.png')}}" class="brand-image img-circle elevation-3 bg-white"
                    style="opacity: .8"/>
                <span class="brand-text font-weight-light {{config('dashboard.adminlte.sidebar_header_text')}}">{{mb_substr(PageInfo::getDashboardTitle(), 0, 25)}}</span>
                </a>
                <!-- Sidebar -->
                <div
                    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-rtl os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{$user->image_url}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{$user->full_name}}</a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            @foreach (trans_array('dashboard::layout.sidebar_menu') as $menu)
                                @if ($menu['items'] ?? null)
                                <li class="nav-item has-treeview d-none">
                                    <a href="#" class="nav-link active" data-title="{{$menu['title']}}">
                                        <i class="nav-icon {{$menu['icon']}}"></i>
                                        <p>
                                            {{$menu['title']}}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" data-title="{{$menu['title']}}">
                                        @foreach ($menu['items'] as $item)
                                            @if (isset($item['policy']))
                                                @can($item['policy']['method'], $item['policy']['model'])
                                                <li class="nav-item">
                                                    <a href="{{$item['url']}}" class="nav-link active">
                                                        <i class="fas fa-caret-left nav-icon"></i>
                                                        <p>{{$item['title']}}</p>
                                                    </a>    
                                                </li>
                                                @endcan
                                            @else
                                                <li class="nav-item">
                                                    <a href="{{$item['url']}}" class="nav-link active">
                                                        <i class="fas fa-caret-left nav-icon"></i>
                                                        <p>{{$item['title']}}</p>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                
                                <li class="nav-item">
                                    <a href="{{$menu['url']}}" class="nav-link">
                                        <i class="nav-icon {{$menu['icon']}}"></i>
                                        <p>
                                            {{$menu['title']}}
                                        </p>
                                    </a>
                                </li>    
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1 class="m-0 text-dark">{{PageInfo::getPageTitle()}}</h1>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid pb-2">
                        <div class="row">
                            <div class="col">
                                <x-dashboard::breadcrumbs :entity="$entity ?? null" :isDashboard="true"/>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                @foreach (Alert::all() as $alert)
                                <div class="alert alert-{{$alert['type']}}">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{$alert['message']}}
                                </div>    
                                @endforeach
                            </div>
                        </div>

						@yield('container')
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>نهاد نمایندگی مقام معظم رهبری در دانشگاه ها</strong>
                <div class="float-right d-none d-sm-inline-block">
                    <b>&copy; {{jdate()->format('Y')}}</b>
                </div>
            </footer>
        </div>

        @php
        $ringBell = NotificationService::ringBell();
        @endphp
        <button type="button" class="btn p-0 btn-warning btn-notification" title="اطلاعیه ها" data-container="body" data-html="true" data-toggle="popover" data-placement="top"
            {!! $ringBell ? 'show' : null !!}>
            <i class="fas fa-bell fa-lg {{$ringBell ? 'animated' : null}}"></i>
        </button>

        <template id="template-notifications">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group">
                        @foreach (NotificationService::getLatestNotifications() as $notification)
                        <li class="list-group-item">
                            <a class="text-dark text-decoration-none" href="/dashboard/notification/notifications/{{$notification->id}}">
                                <i class="{{$notification->icon}}"></i>
                                {{$notification->title}}
                                <small class="text-muted">({{jdate()->fromDatetime($notification->created_at)->format('%A Y/m/d H:i')}})</small>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 text-center">
                    <a href="/dashboard/notification/notifications">مشاهده همه ی اطلاعیه ها</a>
                </div>
            </div>
        </template>

        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="/vendor/dashboard/jquery/jquery.min.js"></script>
        <script src="{{asset('vendor/dashboard/popper/popper.min.js')}}"></script>
        <!-- Bootstrap 4 rtl -->
        <script src="{{asset('vendor/dashboard/bootstrap-rtl/bootstrap.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="/vendor/dashboard/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/vendor/dashboard/js/adminlte.js"></script>
        <script src="{{asset('vendor/dashboard/sweetalert/sweetalert2.js')}}"></script>

        <script src="{{asset('vendor/dashboard/js/dashboard.js')}}"></script>

        <script>
        $(document).ready(function() {
            $(document).on('click', '.nav-link', function() {
                var title = $(this).data('title');
                var parent = $(this).parent();

                if(parent.hasClass('menu-open')) {
                    localStorage.setItem('sidebar-' + title, false);
                }
                else {
                    localStorage.setItem('sidebar-' + title, true);
                }
            });
        });
        </script>

        @stack('scripts')
    </body>
</html>

