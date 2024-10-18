@php
set_page_title('سوابق احراز هویت ' . $user->full_name);
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row">
    <div class="col-12 col-sm-8 col-md-6">
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th colspan="11">
                            تعداد:
                            {{$verify_codes->total()}}
                        </th>
                    </tr>
                    <tr>
                        <th class="fit">ایجاد نشست</th>
                        <th class="fit">بروزرسانی نشست</th>
                        <th class="fit">انقضای کد</th>
                        <th class="fit">تاریخ احراز</th>
                        <th>تعداد تلاش</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($verify_codes as $verify_code)
                    <tr class="">
                        <td class="fit">{{$verify_code->created_at_j}}</td>
                        <td class="fit">{{$verify_code->updated_at_j}}</td>
                        <td class="fit">{{$verify_code->expired_at_j}}</td>
                        <td class="fit">{{$verify_code->verified_at_j ?? 'احراز نشده'}}</td>
                        <td>{{$verify_code->attempts}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
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
        {!! $verify_codes->render() !!}
    </div>
</div>
@endsection