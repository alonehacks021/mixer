@php
use Nahad\Log\Models\Log;

set_page_title('تنظیمات لاگ');
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form autocomplete="off" method="post">
                    @csrf

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is-active-log" name="is_active_log" value="1"
                                {!! get_option('is_active_log') == 1 ? 'checked' : null !!} />
                            <label class="custom-control-label" for="is-active-log">
                                لاگ درخواست ها
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is-active-exception-alert-log" name="is_active_exception_alert_log" value="1"
                                {!! get_option('is_active_exception_alert_log') == 1 ? 'checked' : null !!} />
                            <label class="custom-control-label" for="is-active-exception-alert-log">
                                ارسال هشدار Exception
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>دریافت کنندگان هشدار</label>
                        <select class="custom-select users @error('log_alert_users') is-invalid @enderror" name="log_alert_users[]" multiple>
                            @foreach($alert_users as $alert_user)
                            <option value="{{$alert_user->id}}" selected>{{$alert_user->full_name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feeedback">{{$errors->first('log_alert_users')}}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        بروزرسانی
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('vendor/dashboard/select2/select2.min.css')}}"/>
@endpush

@push('scripts')
<script src="{{asset('vendor/dashboard/select2/select2.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.users').select2({
        dir: 'rtl',
        ajax: {
            url: '/dashboard/ajax/auth/users-select2',
            dataType: 'json'
        }
    });
});
</script>
@endpush