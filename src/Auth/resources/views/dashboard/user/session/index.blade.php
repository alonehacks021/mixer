@php
set_page_title('نشست های ' . $user->full_name);
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th colspan="4">
                            تعداد:
                            {{$user->sessions->count()}}
                        </th>
                    </tr>
                    <tr>
                        <th class="fit">IP</th>
                        <th>User Agent</th>
                        <th class="fit">آخرین فعالیت</th>
                        <th class="fit"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user->sessions as $session)
                    <tr>
                        <td class="fit">{{$session->ip_address}}</td>
                        <td>{{$session->user_agent}}</td>
                        <td class="fit">{{$session->last_activity}}</td>
                        <td class="fit">
                            @can('sessionsDelete', $user)
                            <a href="{{route('user-sessions.destroy', $session->id)}}" class="btn btn-danger btn-icon btn-sm" confirm>
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            نتیجه ای یافت نشد
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection