@php
set_page_title('هشدار ها');
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row">
    <div class="col-12">
        @component('dashboard::components.filter', [
            'filters' => \Nahad\Log\Models\LogAlert::filters()
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
                        <th>پیام</th>
                        <th class="fit">تعداد</th>
                        <th class="fit">پیگیری</th>
                        <th class="fit">اولین رخداد</th>
                        <th class="fit">آخرین رخداد</th>
                        <th class="fit"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($log_alerts as $logAlert)
                    <tr>
                        <td dir="ltr">{{$logAlert->latest_log?->message?->content}}</th>
                        <td class="fit text-center">{{$logAlert->logs_count}}</th>
                        <td class="fit text-center">
                            @if($logAlert->done)
                            <i class="fas fa-check text-success"></i>
                            @else
                            <i class="fas fa-times text-danger"></i>
                            @endif
                        </th>
                        <td class="fit">{{$logAlert->created_at_j}}</th>
                        <td class="fit">{{$logAlert->updated_at_j}}</th>
                        <td class="fit">
                            @can('logs', \Nahad\Log\Models\Log::class)
                            <a class="btn btn-sm btn-info btn-icon" href="{{route('logs.index', ['hash' => $logAlert->hash])}}" data-toggle="tooltip" title="لاگ ها">
                                <i class="fas fa-list"></i>
                            </a>
                            @endcan

                            @can('alertsDone', [\Nahad\Log\Models\Log::class, $logAlert])
                            <a class="btn btn-sm btn-success btn-icon" href="{{route('log-alerts.done', $logAlert->id)}}" data-toggle="tooltip" title="پیگیری شده">
                                <i class="fas fa-check"></i>
                            </a>
                            @endcan
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
        {!! $log_alerts->render() !!}
    </div>
</div>
@endsection