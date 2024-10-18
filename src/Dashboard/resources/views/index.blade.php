@php
use Nahad\Dashboard\Models\Dashboard;

set_page_title('پیشخوان');
@endphp

@extends('dashboard::layout')
    
@section('container')
    @can('dashboardContent', Dashboard::class)
        @includeIf('dashboard.index')
    @endcan

<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">نشانه گزاری ها</div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($bookmarks as $bookmark)
                    <li class="list-group-item">
                        <a href="{{$bookmark->url}}">
                            <i class="fas fa-link fa-sm text-dark"></i>
                            {{$bookmark->title}}
                        </a>
                        <a class="float-right text-danger" href="/dashboard/remove-bookmark/{{$bookmark->id}}">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </li>
                    @empty
                    <li class="list-group-item text-info">
                        شما هنوز هیچ نشانه گذاری ثبت نکرده اید
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection