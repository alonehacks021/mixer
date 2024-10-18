@php
set_page_title('تنظیمات پیشفرض های سیستم کاربری');
@endphp

@extends('dashboard::layout')

@push('styles')
<link rel="stylesheet" href="{{asset('vendor/dashboard/select2/select2.min.css')}}"/>
@endpush

@section('container')
<div class="row">
    <div class="col-12 col-sm-6">
        <form autocomplete="off" method="post">
            @csrf

            <button type="submit" class="btn btn-primary mb-5">
                بروزرسانی
            </button>

            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#general">عمومی</div>
                <div class="card-body collapse" id="general">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="two-step-login-client" value="1" name="two_step_login_client"
                                {!! ($options['two_step_login_client'] ?? null) == 1 ? 'checked' : null !!}>
                            <label class="custom-control-label" for="two-step-login-client">ورود دو مرحله ای کاربران</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            متن پیام کوتاه ورود دو مرحله ای
                            <span class="text-info">[کد]</span>
                        </label>
                        <textarea rows="5" class="form-control @error('two_step_login_sms') is-invalid @enderror" name="two_step_login_sms">{!! $options['two_step_login_sms'] ?? null !!}</textarea>
                        <p class="invalid-feedback">{{$errors->first('two_step_login_sms')}}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#ldap">LDAP</div>
                <div class="card-body collapse" id="ldap">
                    @foreach ($organization_posts as $organization_post)

                    @php
                    $selectedRolesIds = $organization_post->organizationPostRoles->pluck('role_id')->toArray();
                    @endphp

                    <div class="form-group">
                        <label>نقش های {{$organization_post->title}}</label>
                        <select class="roles" name="organizational_post_roles[{{$organization_post->id}}][]" multiple>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}" {!! in_array($role->id, $selectedRolesIds) ? 'selected' : null !!}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                بروزرسانی
            </button>

        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('vendor/dashboard/select2/select2.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.roles').select2({
        width: '100%'
    });
});
</script>
@endpush
