@php
set_page_title('دسترسی های ' . $role->name);
@endphp

@extends('dashboard::layout')

@section('container')

<div class="row">
    <div class="col">
        <form autocomplete="off" id="search-form">
            <input type="text" class="form-control" id="search" placeholder="جستجو" autofocus/>
        </form>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <form autocomplete="off" method="post" action="/dashboard/auth/roles/permissions/{{$role->id}}">
            @csrf
            <div class="row">
                @foreach ($namespaces as $namespace => $permissions)
                <div class="col-xl-4 col-lg-6 pb-4 group">
                    <div class="card h-100">
                        <div class="card-header">
                            <h6 class="card-title" style="margin-bottom:0">@lang('dashboard::namespaces.'.$namespace)</h4>
                        </div>
                        <div class="card-body namespace" id="n-{{$namespace}}" data-count="{{count($permissions)}}">
                            {{-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input all" id="all-{{$namespace}}"/>
                                <label class="custom-control-label" for="all-{{$namespace}}">همه</label>
                            </div>
                            <hr/> --}}
                            @foreach ($permissions as $index => $permission)
                            <div class="custom-control custom-checkbox check">
                                <input type="checkbox" class="custom-control-input permission" id="p-{{$permission->id}}" 
                                    name="permissions[]"
                                    value="{{$permission->id}}"
                                    {!! in_array($permission->id, $role_permissions) ? 'checked' : null !!}>
                                <label class="custom-control-label check-label" for="p-{{$permission->id}}">
                                    {{ $index + 1}}. {{$permission->nick_name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer p-1">
                            <button type="submit" class="btn btn-success btn-sm btn-block">
                                اعمال
                            </button>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
            
            
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#search-form').submit(function(event) {
        event.preventDefault();
    });

    $('.all').on('click', function() {
        if($(this).is(':checked')) {
            $(this).parents().eq(1).find('.permission').attr('checked', 'checked');
        }
        else {
            $(this).parents().eq(1).find('.permission').attr('checked', null);
        }
    });

    $('.permission').on('click', function() {
        handleCheck($(this).parents().eq(1));
    });

    $('.namespace').each(function(index, namespace) {
        handleCheck(namespace);
    });

    function handleCheck(namespace) {
        var checkedCount = $(namespace).find('.permission:checked').length;
        var totalCount = $(namespace).attr('data-count');

        if(checkedCount == totalCount) {
            $(namespace).find('.all').attr('checked', 'checked');
        }
        else {
            $(namespace).find('.all').attr('checked', null);
        }
    }

    $(document).on('keyup', '#search', function() {
        var words = $(this).val().trim().split(' ');
        var query = makeQuery(words).join('');

        if(words.length == 0) {
            $('.check, .group').removeClass('d-none');
        }
        else {
            $('.check, .group').addClass('d-none');

            $(".check-label:not(:has(*))").filter(query).each(function(index, item) {
                $(item).parent().removeClass('d-none');
            });

            $('.group').each(function(index, group) {
                var optionsLength = $(group).find('.check:not(.d-none)').length;

                if(optionsLength > 0) {
                    $(group).removeClass('d-none');
                }
            });
        }
    });

    function makeQuery(words) {
        var query_words = [];

        for(word of words) {
            query_words.push(':contains("' + word + '")');
        }

        return query_words;
    }
});
</script>
@endpush