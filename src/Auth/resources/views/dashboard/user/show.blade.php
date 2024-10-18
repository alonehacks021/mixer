@php
set_page_title('نمایش کاربر');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col-12 col-sm-4 text-center">
        <img class="img-thumbnail img-fluid" src="{{$user->image_url}}"/>
    </div>
    <div class="col-12 col-sm-8 mt-5 mt-sm-0">
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <tbody>
                    <tr>
                        <th class="fit">نام</th>
                        <td>{{$user->first_name}}</td>
                    </tr>
                    <tr>
                        <th class="fit">نام خانوادگی</th>
                        <td>{{$user->last_name}}</td>
                    </tr>
                    <tr>
                        <th class="fit">نام کاربری</th>
                        <td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <th class="fit">موبایل</th>
                        <td>{{$user->mobile}}</td>
                    </tr>
                    <tr>
                        <th class="fit">ایمیل</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th class="fit">وضعیت</th>
                        <td>@lang('auth::consts.user_statuses.' . $user->status)</td>
                    </tr>
                    <tr>
                        <th class="fit">نوع</th>
                        <td>@lang('auth::consts.user_types.' . $user->type)</td>
                    </tr>
                    <tr>
                        <th class="fit">جنسیت</th>
                        <td>@lang('auth::consts.user_genders.' . $user->gender)</td>
                    </tr>
                    <tr>
                        <th class="fit">نقش ها</th>
                        <td>{{$user->roles->implode('name', ', ')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection