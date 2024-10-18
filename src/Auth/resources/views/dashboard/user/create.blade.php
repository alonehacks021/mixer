@php
use Nahad\Auth\Models\User;

set_page_title('ایجاد کاربر');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col-12 col-sm-6">
        <form autocomplete="off" method="post" action="/dashboard/auth/users" enctype="multipart/form-data">
            @csrf

            @can('createAdmin', User::class)
            <div class="form-group">
                <label>نوع</label>
                @php
                $oldType = old('type');
                @endphp
                @foreach (trans('auth::consts.user_types') as $type => $title)
                <div class="custom-control custom-radio">
                    <input type="radio" value="{{$type}}" 
                        class="custom-control-input" 
                        id="type-{{$type}}" 
                        name="type"
                        {!! $oldType == $type ? 'checked' : null !!}>
                    <label class="custom-control-label" for="type-{{$type}}">{{$title}}</label>
                </div>    
                @endforeach
                <p class="text-danger small">{{$errors->first('type')}}</p>
            </div>
            @endcan

            <div class="form-group">
                <label>جنسیت</label>
                @php
                $oldGender = old('gender');
                @endphp
                @foreach (trans('auth::consts.user_genders') as $gender => $title)
                <div class="custom-control custom-radio">
                    <input type="radio" value="{{$gender}}" 
                        class="custom-control-input" 
                        id="gender-{{$gender}}" 
                        name="gender"
                        {!! $oldGender == $gender ? 'checked' : null !!}>
                    <label class="custom-control-label" for="gender-{{$gender}}">{{$title}}</label>
                </div>    
                @endforeach
                <p class="text-danger small">{{$errors->first('gender')}}</p>
            </div>

            <div class="form-group">
                <label>وضعیت</label>
                @php
                $oldStatus = old('status');
                @endphp
                @foreach (trans('auth::consts.user_statuses') as $status => $title)
                <div class="custom-control custom-radio">
                    <input type="radio" value="{{$status}}" 
                        class="custom-control-input" 
                        id="status-{{$status}}" 
                        name="status"
                        {!! $oldStatus == $status ? 'checked' : null !!}>
                    <label class="custom-control-label" for="status-{{$status}}">{{$title}}</label>
                </div>    
                @endforeach
                <p class="text-danger small">{{$errors->first('status')}}</p>
            </div>

            <div class="form-group">
                <label id="username-label">نام کاربری</label>
                <input type="text" name="username" id="username"
                    class="form-control @error('username') is-invalid @enderror"
                    value="{{old('username')}}"/>
                <p class="invalid-feedback">{{$errors->first('username')}}</p>
            </div>
            <div class="form-group">
                <label>نام</label>
                <input type="text" name="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                    value="{{old('first_name')}}"/>
                <p class="invalid-feedback">{{$errors->first('first_name')}}</p>
            </div>
            <div class="form-group">
                <label>نام خانوادگی</label>
                <input type="text" name="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    value="{{old('last_name')}}"/>
                <p class="invalid-feedback">{{$errors->first('last_name')}}</p>
            </div>
            <div class="form-group">
                <label>موبایل</label>
                <input type="text" name="mobile"
                    class="form-control @error('mobile') is-invalid @enderror"
                    value="{{old('mobile')}}"/>
                <p class="invalid-feedback">{{$errors->first('mobile')}}</p>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{old('email')}}"/>
                <p class="invalid-feedback">{{$errors->first('email')}}</p>
            </div>
            <div class="form-group" id="password">
                <label>رمزعبور</label>
                <input type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"/>
                <p class="invalid-feedback">{{$errors->first('password')}}</p>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">انتخاب تصویر</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                افزودن
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#username').on('keyup', function() {
        $('#email').val($(this).val() + '@nahad.ir');
    });

    handleInput();
    
    $('[name="type"]').on('change', function() {
        handleInput();
    });

    function handleInput() {
        var value = $('[name="type"]:checked').val();

        if(value == {{User::TYPE_ADMIN}}) {
            $('#password').show();
            $('#username-label').html('نام کاربری');
        }
        else {
            $('#password').hide();
            $('#username-label').html('کدملی');
        }
    }
});
</script>
@endpush