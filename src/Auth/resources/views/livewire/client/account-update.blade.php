@php
use Nahad\Dashboard\Support\Alert;
@endphp

<div class="row">
    <div class="col py-5">
        <h5 class="weight-800 mb-5">بروزرسانی حساب کاربری</h5>

        <form wire:submit.prevent="save">
            <input type="hidden" id="birthday-input" value="{{$user->birthday}}"/>
            <div class="mb-3">
                <label>نام</label>
                <input type="text" class="form-control @error('user.first_name') is-invalid @enderror" value="{{$user->first_name}}" disabled/>
                <div class="invalid-feedback">{{$errors->first('user.first_name')}}</div>
            </div>

            <div class="mb-3">
                <label>نام خانوادگی</label>
                <input type="text" class="form-control @error('user.last_name') is-invalid @enderror" value="{{$user->last_name}}" disabled/>
                <div class="invalid-feedback">{{$errors->first('user.last_name')}}</div>
            </div>

            <div class="mb-3">
                <label>موبایل</label>
                <input type="text" class="form-control @error('user.mobile') is-invalid @enderror" value="{{$user->mobile}}" disabled/>
                <div class="invalid-feedback">{{$errors->first('user.mobile')}}</div>
            </div>

            <div class="mb-3">
                <label>تاریخ تولد</label>
                <input type="text" class="form-control bg-white @error('user.birthday') is-invalid @enderror" value="{{$user->birthday_j}}" id="birthday" readonly/>
                <div class="invalid-feedback">{{$errors->first('user.birthday')}}</div>
            </div>

            <div class="mb-3">
                <label>جنسیت</label>
                <select class="form-control @error('user.gender') is-invalid @enderror" wire:model.defer="user.gender">
                    <option value="">انتخاب</option>
                    @foreach (trans('auth::consts.user_genders') as $id => $gender)
                    <option value="{{$id}}">{{$gender}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">{{$errors->first('user.gender')}}</div>
            </div>

            <button type="submit" class="btn btn-primary">
                <span wire:loading.remove wire:target="save">
                    <i class="fas fa-save"></i>
                    بروزرسانی
                </span>
                <span wire:loading wire:target="save">
                    <i class="fas fa-spinner fa-spin"></i>
                    لطفا صبر کنید
                </span>
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#birthday').MdPersianDateTimePicker({
        enableTimePicker: false,
        dateFormat: 'yyyy-MM-dd',
        //modalMode: true,
        targetTextSelector: '#birthday',
        targetDateSelector: '#birthday-input',
    });

    $(document).on('change', '#birthday-input', function() {
        @this.set('user.birthday', $(this).val(), true);
    });

    $(window).on('saved', function() {
        Swal.fire({
            icon: 'success',
            text: 'بروزرسانی حساب کاربری با موفقیت انجام شد',
            confirmButtonText: 'برو به پنل کاربری',
            showCancelButton: true,
            cancelButtonText: 'باشه!'
        }).then(function(event) {
            if(event.isConfirmed) {
                location.href = '/';
            }
        });
    });
});
</script>
@endpush