@php
set_page_title('نقش های کاربر');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col-12 col-sm-6">
        <form autocomplete="off" method="post" action="/dashboard/auth/users/roles/{{$user->id}}">
            @csrf

            @foreach ($roles as $role)
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="r-{{$role->id}}" 
                    name="roles[]"
                    value="{{$role->id}}"
                    {!! in_array($role->id, $user_roles) ? 'checked' : null !!}>
                <label class="custom-control-label" for="r-{{$role->id}}">{{$role->name}}</label>
            </div>
            @endforeach
            
            <button type="submit" class="btn btn-primary mt-5">
                اعمال
            </button>
        </form>
    </div>
</div>
@endsection