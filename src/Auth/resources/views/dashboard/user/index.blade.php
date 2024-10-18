@php
use Nahad\Dashboard\Support\PageInfo;
use Nahad\Auth\Models\User;
use Nahad\Auth\Support\UserMenu;

set_page_title('کاربران');
$currentUser = \Auth::user();
@endphp

@extends('dashboard::layout')

@section('container')

@include('auth::dashboard.user.index-filter')

<div class="row">
    <div class="col-12">
        <div class="table-responsive" style="min-height: 1000px;">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th colspan="11">
                            تعداد:
                            {{$users->total()}}
                        </th>
                    </tr>
                    <tr>
                        <th class="fit"></th>
                        <th class="fit">شناسه</th>
                        <th class="fit">نوع</th>
                        <th class="fit">جنسیت</th>
                        <th class="fit">نام کاربری</th>
                        <th class="fit">موبایل</th>
                        <th>نام و نام خانوادگی</th>
                        <th class="fit">تاریخ ایجاد</th>
                        <th class="fit">تاریخ بروزرسانی</th>
                        <th class="fit">وضعیت</th>
                        <th class="fit"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr class="">
                        <td class="fit">
                            <img class="rounded" style="width: 40px;" src="{{$user->image_url}}"/>
                        </td>
                        <td class="fit">{{$user->id}}</td>
                        <td class="fit">{{$user->type_text}}</td>
                        <td class="fit">{{$user->gender_text}}</td>
                        <td class="fit font-monoscape">{{$user->username}}</td>
                        <td class="fit font-monoscape">{{$user->mobile}}</td>
                        <td>{{$user->full_name}}</td>
                        <td class="fit">{{jdate()->fromDateTime($user->created_at)->format('Y/m/d H:i')}}</td>
                        <td class="fit">{{jdate()->fromDateTime($user->updated_at)->format('Y/m/d H:i')}}</td>
                        <td class="fit">{{$user->status == User::STATUS_BAN ? 'مسدود' : 'فعال'}}</td>
                        <td class="fit">
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-warning btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @can('show', $user)
                                    <a class="dropdown-item" href="/dashboard/auth/users/{{$user->id}}">
                                        مشاهده
                                    </a>
                                    @endcan

                                    @can('update', $user)
                                    <a class="dropdown-item" href="/dashboard/auth/users/{{$user->id}}/edit">
                                        ویرایش
                                    </a>
                                    @endcan

                                    @can('_2fa', $user)
                                    <a class="dropdown-item" href="/dashboard/auth/users/{{$user->id}}/user-2fa">
                                        سوابق احراز هویت
                                    </a>
                                    @endcan

                                    @can('sessions', $user)
                                    <a class="dropdown-item" href="/dashboard/auth/users/{{$user->id}}/sessions">
                                        نشست ها
                                    </a>
                                    @endcan

                                    @foreach (UserMenu::items() as $item)
                                    <a class="dropdown-item" href="{{str_replace('{user_id}', $user->id, $item['url'])}}">{{$item['title']}}</a>
                                    @endforeach
                                </div>
                            </div>

                            @can('updateRoles', $user)
                            <a href="/dashboard/auth/users/roles/{{$user->id}}" class="btn btn-dark btn-icon btn-sm">
                                <i class="fas fa-user-lock"></i>
                            </a>
                            @endcan

                            @can('delete', $user)
                            <a href="/dashboard/auth/users/destroy/{{$user->id}}" confirm confirm-message="آیا از حذف اطمینان دارید؟" class="btn btn-danger btn-icon btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">
                            نتیجه ای یافت نشد
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        {!! $users->render() !!}
    </div>
</div>
@endsection