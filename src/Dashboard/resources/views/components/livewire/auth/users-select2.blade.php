<div wire:ignore>
    <select class="form-select users" data-placeholder="{{$placeholder ?? null}}" data-component-id="{{$componentId}}" data-model="{{$model}}"></select>
</div>

@once
@push('scripts')
<script>
document.addEventListener('livewire:navigated', () => {
    var optionFormat = function(item) {
        if ( !item.id ) {
            return item.text;
        }

        var span = document.createElement('span');
        var template = '';

        template += '<img src="' + item.thumbnail_url + '" class="rounded-circle h-20px me-2" alt="image"/>';
        template += item.text;

        span.innerHTML = template;

        return $(span);
    }

    setTimeout(() => {
        $('.users').select2({
            dir: 'rtl',
            templateSelection: optionFormat,
            templateResult: optionFormat,
            ajax: {
                url: '/dashboard/ajax/auth/users-select2?with_thumbnail=1',
                dataType: 'json'
            }
        });
    }, 2000);

    $('.users').on('change', function() {
        var component = Livewire.find($(this).attr('data-component-id'));
        var model = $(this).attr('data-model');

        if(component) {
            component.set(model, $(this).select2('val'), true);
        }
    });
});
</script>
@endpush

@endonce