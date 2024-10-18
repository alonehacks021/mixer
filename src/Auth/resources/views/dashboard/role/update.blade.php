@php
set_page_title('بروزرسانی نقش');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col-12 col-sm-6">
        <form autocomplete="off" method="post" action="/dashboard/auth/roles/{{$role->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>عنوان نقش</label>
                <input type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{$role->name}}"/>
                <p class="invalid-feedback">{{$errors->first('name')}}</p>
            </div>
            
            <button type="submit" class="btn btn-primary">
                بروزرسانی
            </button>
        </form>
    </div>
</div>
@endsection