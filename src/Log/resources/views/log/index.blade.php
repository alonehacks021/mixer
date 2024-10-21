@php
use Nahad\Log\Models\Log;

set_page_title('لاگ های سیستم');
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row">
    <div class="col-12">
        @component('dashboard::components.filter', [
            'filters' => Log::filters()
        ])
            
        @endcomponent
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead class="thead-light">
                    <tr>
                        <th class="fit">شناسه</th>
                        <th class="fit">شناسه کاربر</th>
                        <th>نام و نام خانوادگی</th>
                        <th class="fit">نوع درخواست</th>
                        <th class="fit">نوع لاگ</th>
                        <th class="fit">آی پی</th>
                        <th class="fit">تاریخ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                    <tr data-toggle="collapse" data-target="#log-{{$log->id}}">
                        <td class="fit">{{$log->id}}</td>
                        <td class="fit">{{$log->user_id}}</td>
                        <td>
                            @if ($log->user)
                            {{$log->user->full_name}}
                            @else
                            <span class="text-danger">
                                <i class="fas fa-user-times mr-2"></i>
                                کاربر ناشناس     
                            </span>   
                            @endif
                        </td>
                        <td class="fit">{{$log->method}}</td>
                        <td class="fit">{{optional($log->type)->title}}</td>
                        <td class="fit">{{$log->ip}}</td>
                        <td class="fit">{{jdate()->fromDatetime($log->logged_at)->format('Y/m/d H:i:s')}}</td>
                    </tr>
                    <tr class="collapse" id="log-{{$log->id}}">
                        <td colspan="7" class="text-left bg-secondary">
                            <ul class="list-group">
                                <li class="list-group-item text-dark">
                                    <span class="text-info">مسیر: </span>
                                    {{$log->path}}
                                </li>

                                <li class="list-group-item text-dark">
                                    <span class="text-info">مرورگر: </span>
                                    {{$log->user_agent}}
                                </li>

                                @if($log->message?->content)
                                <li class="list-group-item text-dark">
                                    <span class="text-info">پیام: </span>
                                    {{$log->message?->content}}
                                </li>
                                @endif

                                @if (count((array)$log->data) > 0)
                                <li class="list-group-item p-1 text-dark">
                                    <table class="table table-bordered table-sm mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="2">
                                                    داده ها
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($log->data as $key => $value)
                                            <tr>
                                                <td class="fit">{{$key}}</td>
                                                <td>{{(is_object($value) || is_array($value)) ? json_encode($value) : $value}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </li>
                                @endif

                                @if(count((array)$log->message?->trace) > 0)
                                <li class="list-group-item p-1 text-dark">
                                    <table class="table table-bordered table-sm mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="3">
                                                    Trace
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($log->message?->trace as $key => $value)
                                            <tr>
                                                <td class="fit">{{$value->line}}</td>
                                                <td class="fit">{{$value->function}}</td>
                                                <td>{{$value->file}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
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
        {!! $logs->render() !!}
    </div>
</div>
@endsection