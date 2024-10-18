@php
set_page_title('مشاهده توکن');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col">
        <div class="alert alert-warning">
            توکن زیر در جای مطمئن ذخیره نمایید، در صورت فراموشی غیر قابل مشاهده مجدد و بازگشت میباشد
        </div>

        <h5 class="alert alert-success">
            Bearer {{$token->plainTextToken}}
        </h5>
    </div>
</div>

@endsection