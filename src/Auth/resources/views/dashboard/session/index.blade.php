@php
set_page_title('نشست ها');
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row mb-3">
    <div class="col-12">
        <a href="{{route('terminate-all-sessions')}}" class="btn btn-warning float-right" confirm confirm-message="آیا از پایان تمامی نشست ها مطمئن هستید؟">
            <i class="fas fa-user-times"></i>
            پایان تمامی نشست ها
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @component('dashboard::components.filter', [
            'filters' => \Nahad\Auth\Models\Session::filters()
        ])

        @endcomponent
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th colspan="8">
                            تعداد:
                            {{$sessions->total()}}
                        </th>
                    </tr>
                    <tr>
                        <th class="fit">نام</th>
                        <th class="fit">نام خانوادگی</th>
                        <th class="fit">نام کاربری</th>
                        <th class="fit">موبایل</th>
                        <th class="fit">IP</th>
                        <th>User Agent</th>
                        <th class="fit">آخرین فعالیت</th>
                        <th class="fit"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sessions as $session)
                    <tr>
                        <td class="fit">{{$session->user?->first_name}}</td>
                        <td class="fit">{{$session->user?->last_name}}</td>
                        <td class="fit">{{$session->user?->username}}</td>
                        <td class="fit">{{$session->user?->mobile}}</td>
                        <td class="fit">{{$session->ip_address}}</td>
                        <td>{{$session->user_agent}}</td>
                        <td class="fit">{{$session->last_activity}}</td>
                        <td class="fit">
                            @can('sessions', $session->user)
                            <a href="/dashboard/auth/users/{{$session->user_id}}/sessions" class="btn btn-primary btn-icon btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
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
    <div class="col-12">
        {!! $sessions->render() !!}
    </div>
</div>

@endsection