@php
set_page_title('نقش ها');
@endphp

@extends('dashboard::layout')

@section('container')

@include('auth::dashboard.role.index-filter')

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>شناسه</th>
                        <th>نام</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <td class="fit">{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td class="fit">
                            @can('update', $role)
                            <a href="/dashboard/auth/roles/{{$role->id}}/edit" class="btn btn-info btn-sm btn-icon">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            @endcan

                            @can('updatePermissions', $role)
                            <a href="/dashboard/auth/roles/permissions/{{$role->id}}" class="btn btn-dark btn-sm btn-icon">
                                <i class="fas fa-fingerprint"></i>
                            </a>
                            @endcan

                            @can('delete', $role)
                            <a href="/dashboard/auth/roles/destroy/{{$role->id}}" confirm confirm-message="آیا از حذف اطمینان دارید؟" class="btn btn-danger btn-sm btn-icon">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
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
        {!! $roles->render() !!}
    </div>
</div>
@endsection