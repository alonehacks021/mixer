@php
use Nahad\Auth\Models\User;

set_page_title('بروزرسانی کاربر');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col-12 col-sm-6">
        <form autocomplete="off" method="post" action="/dashboard/auth/users/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>جنسیت</label>
                @foreach (trans('auth::consts.user_genders') as $gender => $title)
                <div class="custom-control custom-radio">
                    <input type="radio" value="{{$gender}}" 
                        class="custom-control-input" 
                        id="gender-{{$gender}}" 
                        name="gender"
                        {!! $user->gender == $gender ? 'checked' : null !!}>
                    <label class="custom-control-label" for="gender-{{$gender}}">{{$title}}</label>
                </div>    
                @endforeach
                <p class="text-danger small">{{$errors->first('gender')}}</p>
            </div>

            @can('changeStatus', $user)
            <div class="form-group">
                <label>وضعیت</label>
                @php
                $oldStatus = $user->status;
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
            @endcan

            <div class="form-group">
                <label>نام</label>
                <input type="text" name="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                    value="{{$user->first_name}}"/>
                <p class="invalid-feedback">{{$errors->first('first_name')}}</p>
            </div>
            <div class="form-group">
                <label>نام خانوادگی</label>
                <input type="text" name="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    value="{{$user->last_name}}"/>
                <p class="invalid-feedback">{{$errors->first('last_name')}}</p>
            </div>

            @if ($user->type == User::TYPE_ADMIN)
            <div class="form-group">
                <label>نام کاربری</label>
                <input type="text" name="username"
                    class="form-control @error('username') is-invalid @enderror"
                    value="{{$user->username}}"/>
                <p class="invalid-feedback">{{$errors->first('username')}}</p>
            </div>
            <div class="form-group">
                <label>موبایل</label>
                <input type="text" name="mobile"
                    class="form-control @error('mobile') is-invalid @enderror"
                    value="{{$user->mobile}}"/>
                <p class="invalid-feedback">{{$errors->first('mobile')}}</p>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{$user->email}}"/>
                <p class="invalid-feedback">{{$errors->first('email')}}</p>
            </div>
            <div class="form-group">
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
            @endif
            
            <button type="submit" class="btn btn-primary">
                بروزرسانی
            </button>
        </form>
    </div>
</div>
@endsection