@php
set_page_title('توکن های دسترسی کاربر');
@endphp

@extends('dashboard::layout')

@section('container')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#create-token">
                ایجاد توکن جدید
            </div>
            <div class="card-body collapse" id="create-token">
                <form autocomplete="off" action="/dashboard/auth/users/tokens/generate/{{$user->id}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>نام توکن</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}"/>
                        <p class="invalid-feedback">{{$errors->first('name')}}</p>
                    </div>

                    <button type="submit" class="btn btn-primary" confirm confirm-title="توجه!" confirm-message="آیا از ایجاد توکن جدید مطمئن هستید؟">
                        ایجاد توکن جدید
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="fit">شناسه</th>
                        <th>نام</th>
                        <th class="fit">تاریخ ایجاد</th>
                        <th class="fit"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user->tokens as $token)
                    <tr>
                        <td class="fit">{{$token->id}}</td>
                        <td>{{$token->name}}</td>
                        <td class="fit">{{jdate()->fromDateTime($token->created_at)->format('Y/m/d H:i:s')}}</td>
                        <td class="fit">
                            <a href="/dashboard/auth/users/tokens/destroy/{{$user->id}}/{{$token->id}}" class="btn btn-danger btn-sm" confirm confirm-message="از حذف توکن مطمئن هستید؟">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            کاربر هیچ توکنی ندارد
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection