<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#filters" x-on:filters-applied.window="$refs.filtersClose.click()">
    <i class="fa-solid fa-filter"></i>
    فیلتر
</button>

<div class="modal fade" id="filters" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" x-ref="filtersClose" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y pt-0 pb-15">
                <div class="text-center mb-13">
                    <h1 class="mb-3">فیلتر ها</h1>
                </div>
                <form wire:submit.prevent="applyFilters">
                
                
                    @foreach ($model::filters() ?? [] as $name => $filter)
                        @php
                        $type = is_array($filter) ? $filter['type'] : $filter;
                        $label = $filter['label'] ?? null;
                        @endphp
                        <div class="row mb-5">
                            <div class="col">
                                <label class="mb-4">{{$label}}</label>
                        @switch($type)
                            @case('ajax')
                                <div class="col-12">
                                    <select class="form-control mb-2 select2" name="{{$name}}" data-url="{{$filter['url'] ?? null}}"
                                        value="{{request($name)}}"
                                        placeholder="{{$label}}">
                                        @if($filter['model'] ?? null)
                                            @php
                                            $value = request($name);
                                            $text = $filter['text'];
                                            $entity = $filter['model']::find($value);
                                            @endphp
                                            @if($entity)
                                            <option value="{{$entity->id}}" selected>{{$entity->$text}}</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                                @break
                            @case('text')
                                <x-dashboard::livewire.filter.controls.text :name="$name"/>
                                @break
                            @case('number')
                                <x-dashboard::livewire.filter.controls.text :name="$name"/>
                                @break
                            @case('select')
                                <x-dashboard::livewire.filter.controls.select :items="$filter['items'] ?? []" :name="$name"/>
                                @break
                            @case('date')
                                <x-dashboard::livewire.filter.controls.date :name="$name"/>
                                @break
                            @case('date-range')
                                <div class="col-12 col-sm-6 col-md-4" wire:ignore>
                                    <div class="input-group mb-2" id="date-{{$name}}-start">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn-start">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="{{$name}}[0]" value="{{$data[$name][0] ?? null}}" id="date-{{$name}}-date-start"/>
                                        <input type="text" class="form-control" placeholder="{{$label}} از" id="date-{{$name}}-text-start" readonly/>
                                        <div class="input-group-append">
                                            <button class="btn btn-danger clear" type="button">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4" wire:ignore>
                                    <div class="input-group mb-2" id="date-{{$name}}-end">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn-end">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="{{$name}}[1]" value="{{$data[$name][1] ?? null}}" id="date-{{$name}}-date-end"/>
                                        <input type="text" class="form-control" placeholder="{{$label}} تا" id="date-{{$name}}-text-end" readonly/>
                                        <div class="input-group-append">
                                            <button class="btn btn-danger clear" type="button">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @push('scripts')
                                <script>
                                $(document).ready(function() {
                                    $('#date-{{$name}}-btn-start').MdPersianDateTimePicker({ 
                                        targetTextSelector: '#date-{{$name}}-text-start',
                                        targetDateSelector: '#date-{{$name}}-date-start',
                                        textFormat: 'yyyy/MM/dd HH:mm:ss',
                                        dateFormat: 'yyyy-MM-dd HH:mm:ss',
                                        enableTimePicker: true
                                    });
                
                                    $('#date-{{$name}}-start').on('click', '.clear', function() {
                                        $('#date-{{$name}}-text-start').val(null);
                                        $('#date-{{$name}}-date-start').val(null);
                                    });
                
                                    $('#date-{{$name}}-btn-end').MdPersianDateTimePicker({ 
                                        targetTextSelector: '#date-{{$name}}-text-end',
                                        targetDateSelector: '#date-{{$name}}-date-end',
                                        textFormat: 'yyyy/MM/dd HH:mm:ss',
                                        dateFormat: 'yyyy-MM-dd HH:mm:ss',
                                        enableTimePicker: true
                                    });
                
                                    $('#date-{{$name}}-end').on('click', '.clear', function() {
                                        $('#date-{{$name}}-text-end').val(null);
                                        $('#date-{{$name}}-date-end').val(null);
                                    });
                
                                    $('#date-{{$name}}-date-start').on('change', function() {
                                        @this.set('data.{{$name}}.0', $(this).val(), true);
                                    });
                
                                    $('#date-{{$name}}-date-end').on('change', function() {
                                        @this.set('data.{{$name}}.1', $(this).val(), true);
                                    });
                                });
                                </script>
                                @endpush
                                @break
                            @case('range')
                                <div class="col-12 col-sm-6 col-md-4">
                                    <input type="number" class="form-control mb-2" name="{{$name}}[0]" 
                                        wire:model.defer="data.{{$name}}.0"
                                        placeholder="{{$label}} از"/>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <input type="number" class="form-control mb-2" name="{{$name}}[1]" 
                                        wire:model.defer="data.{{$name}}.1"
                                        placeholder="{{$label}} تا"/>
                                </div>
                                @break
                            @default
                                
                        @endswitch
                    </div>
                </div>
                    @endforeach

                    <div class="row mt-10">
                        <div class="col">
                            <x-dashboard::livewire.buttons.button
                                type="submit"
                                icon="fa-solid fa-search"
                                btn="primary"
                                click="applyFilters">
                                اعمال
                            </x-dashboard::livewire.buttons.button>

                            <x-dashboard::livewire.buttons.button
                                icon="fa-solid fa-refresh"
                                btn="warning"
                                click="resetFilters">
                                بازنشانی
                            </x-dashboard::livewire.buttons.button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@once
@push('styles')
<link rel="stylesheet" href="{{asset('vendor/dashboard/md-bootstrap-5/mds.bs.datetimepicker.style.css')}}"/>
@endpush
@endonce

@once
@push('scripts')
<script src="{{asset('vendor/dashboard/md-bootstrap-5/mds.bs.datetimepicker.js')}}"></script>
<script>
window.addEventListener('livewire:navigated', function() {
    document.querySelectorAll('#filters .date').forEach(function(element) {
        var dateId = element.getAttribute('data-date-id');

        new mds.MdsPersianDateTimePicker(element, {
            targetTextSelector: `#text-${dateId}`,
            targetDateSelector: `#input-${dateId}`,
            dateFormat: 'yyyy-MM-dd',
        });
    });

    $('.select2').select2();

    $('.select2').on('change', function() {
        var model = $(this).attr('data-model');

        @this.set(model, $(this).select2('val'), false);
    });
});
</script>
@endpush
@endonce
