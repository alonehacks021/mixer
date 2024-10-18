@push('styles')
<link rel="stylesheet" href="{{asset('vendor/dashboard/md-date-picker/jquery.md.bootstrap.datetimepicker.style.css')}}"/>
<link rel="stylesheet" href="{{asset('vendor/dashboard/select2/select2.min.css')}}"/>
@endpush

@push('scripts')
<script src="{{asset('vendor/dashboard/md-date-picker/jquery.md.bootstrap.datetimepicker.js')}}"></script>
<script src="{{asset('vendor/dashboard/select2/select2.min.js')}}"></script>
@endpush

<div class="card {{$bg_color ?? null}}">
    <div class="card-header" data-toggle="collapse" data-target="#filter" role="button">
        فیلتر/جستجو
        <i class="fas fa-search fa-lg float-right mt-1"></i>
    </div>
    <div class="card-body collapse" id="filter">
        <form autocomplete="off" method="get" id="filter-form">
        <div class="row">
            @foreach ($filters ?? [] as $name => $filter)
                @php
                    $type = is_array($filter) ? $filter['type'] : $filter;
                    $label = $filter['label'] ?? null;
                @endphp

                @if (isset($filter['policy']))
                    @can($filter['policy']['method'], $filter['policy']['model'])
                        @switch($type)
                            @case('ajax')
                                <div class="col-12 col-sm-6 col-md-4">
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
                                <div class="col-12 col-sm-6 col-md-4">
                                    <input type="text" class="form-control mb-2" name="{{$name}}" 
                                        value="{{request($name)}}"
                                        placeholder="{{$label}}"/>
                                </div>
                                @break
                            @case('number')
                                <div class="col-12 col-sm-6 col-md-4">
                                    <input type="number" class="form-control mb-2" name="{{$name}}" 
                                        value="{{request($name)}}"
                                        placeholder="{{$label}}"/>
                                </div>
                                @break
                            @case('select')
                                <div class="col-12 col-sm-6 col-md-4">
                                    @php
                                    $old = request($name);
                                    @endphp
                                    <select class="custom-select mb-2" name="{{$name}}" placeholder="{{$label}}">
                                        <option value="-1">انتخاب/{{$label}}</option>
                                        @foreach ($filter['items'] ?? [] as $id => $item)
                                        <option value="{{$id}}"
                                            {!! (!is_null($old) && ($old == $id)) ? 'selected' : null !!}>{{$item}}</option>
                                        @endforeach
                                        </select>
                                </div>
                                @break
                            @case('date')
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="input-group mb-2" id="date-{{$name}}">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="{{$name}}" value="{{request($name)}}" id="date-{{$name}}-date"/>
                                        <input type="text" class="form-control" placeholder="{{$label}}" id="date-{{$name}}-text" readonly/>
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
                                    $('#date-{{$name}}-btn').MdPersianDateTimePicker({ 
                                        targetTextSelector: '#date-{{$name}}-text',
                                        targetDateSelector: '#date-{{$name}}-date',
                                        textFormat: 'yyyy/MM/dd',
                                        dateFormat: 'yyyy-MM-dd'
                                    });
                                
                                    $('#date-{{$name}}').on('click', '.clear', function() {
                                        $('#date-{{$name}}-text').val(null);
                                        $('#date-{{$name}}-date').val(null);
                                    });
                                });
                                </script>
                                @endpush
                                @break
                            @case('date-range')
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="input-group mb-2" id="date-{{$name}}-start">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn-start">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="{{$name}}[0]" value="{{request($name)[0] ?? null}}" id="date-{{$name}}-date-start"/>
                                        <input type="text" class="form-control" placeholder="{{$label}} از" id="date-{{$name}}-text-start" readonly/>
                                        <div class="input-group-append">
                                            <button class="btn btn-danger clear" type="button">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="input-group mb-2" id="date-{{$name}}-end">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn-end">
                                                <i class="fas fa-calendar"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="{{$name}}[1]" value="{{request($name)[1] ?? null}}" id="date-{{$name}}-date-end"/>
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
                                });
                                </script>
                                @endpush
                                @break
                            @case('range')
                                <div class="col-12 col-sm-6 col-md-4">
                                    <input type="number" class="form-control mb-2" name="{{$name}}[0]" 
                                        value="{{request($name)[0] ?? null}}"
                                        placeholder="{{$label}} از"/>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <input type="number" class="form-control mb-2" name="{{$name}}[1]" 
                                        value="{{request($name)[1] ?? null}}"
                                        placeholder="{{$label}} تا"/>
                                </div>
                                @break
                            @default

                        @endswitch
                    @endcan
                @else
                @switch($type)
                    @case('ajax')
                        <div class="col-12 col-sm-6 col-md-4">
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
                        <div class="col-12 col-sm-6 col-md-4">
                            <input type="text" class="form-control mb-2" name="{{$name}}" 
                                value="{{request($name)}}"
                                placeholder="{{$label}}"/>
                        </div>
                        @break
                    @case('number')
                        <div class="col-12 col-sm-6 col-md-4">
                            <input type="number" class="form-control mb-2" name="{{$name}}" 
                                value="{{request($name)}}"
                                placeholder="{{$label}}"/>
                        </div>
                        @break
                    @case('select')
                        <div class="col-12 col-sm-6 col-md-4">
                            @php
                            $old = request($name);
                            @endphp
                            <select class="custom-select mb-2" name="{{$name}}" placeholder="{{$label}}">
                                <option value="-1">انتخاب/{{$label}}</option>
                                @foreach ($filter['items'] ?? [] as $id => $item)
                                <option value="{{$id}}"
                                    {!! (!is_null($old) && ($old == $id)) ? 'selected' : null !!}>{{$item}}</option>
                                @endforeach
                                </select>
                        </div>
                        @break
                    @case('date')
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="input-group mb-2" id="date-{{$name}}">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn">
                                        <i class="fas fa-calendar"></i>
                                    </button>
                                </div>
                                <input type="hidden" name="{{$name}}" value="{{request($name)}}" id="date-{{$name}}-date"/>
                                <input type="text" class="form-control" placeholder="{{$label}}" id="date-{{$name}}-text" readonly/>
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
                            $('#date-{{$name}}-btn').MdPersianDateTimePicker({ 
                                targetTextSelector: '#date-{{$name}}-text',
                                targetDateSelector: '#date-{{$name}}-date',
                                textFormat: 'yyyy/MM/dd',
                                dateFormat: 'yyyy-MM-dd'
                            });

                            $('#date-{{$name}}').on('click', '.clear', function() {
                                $('#date-{{$name}}-text').val(null);
                                $('#date-{{$name}}-date').val(null);
                            });
                        });
                        </script>
                        @endpush
                        @break
                    @case('date-range')
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="input-group mb-2" id="date-{{$name}}-start">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn-start">
                                        <i class="fas fa-calendar"></i>
                                    </button>
                                </div>
                                <input type="hidden" name="{{$name}}[0]" value="{{request($name)[0] ?? null}}" id="date-{{$name}}-date-start"/>
                                <input type="text" class="form-control" placeholder="{{$label}} از" id="date-{{$name}}-text-start" readonly/>
                                <div class="input-group-append">
                                    <button class="btn btn-danger clear" type="button">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="input-group mb-2" id="date-{{$name}}-end">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn-end">
                                        <i class="fas fa-calendar"></i>
                                    </button>
                                </div>
                                <input type="hidden" name="{{$name}}[1]" value="{{request($name)[1] ?? null}}" id="date-{{$name}}-date-end"/>
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
                        });
                        </script>
                        @endpush
                        @break
                    @case('range')
                        <div class="col-12 col-sm-6 col-md-4">
                            <input type="number" class="form-control mb-2" name="{{$name}}[0]" 
                                value="{{request($name)[0] ?? null}}"
                                placeholder="{{$label}} از"/>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <input type="number" class="form-control mb-2" name="{{$name}}[1]" 
                                value="{{request($name)[1] ?? null}}"
                                placeholder="{{$label}} تا"/>
                        </div>
                        @break
                    @default
                        
                @endswitch

                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">{!! $slot !!}</div>  
            <hr/>  
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-3 mb-2 mb-sm-0">
                <button type="submit" class="btn btn-dark btn-block">
                    فیلتر
                </button>
            </div>   
            <div class="col-12 col-sm-4 col-md-3">
                <a type="button" class="btn btn-danger btn-block" href="/{{request()->path()}}">
                    بازنشانی
                </a>
            </div>   

            {!! $buttons ?? null !!}  

        </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#filter-form').on('click', 'button[type="submit"]', function(event) {
        event.preventDefault();

        var form = $('#filter-form');
        var action = $(this).attr('data-action');

        if(action != undefined) {
            form.attr('action', action);
        }

        form.submit();

        form.attr('action', null);
    });

    $('#filter-form .select2').each(function(index, item) {
        var url = $(this).data('url');
        var placeholder = $(this).attr('placeholder');

        $(item).select2({
            dir: 'rtl',
            width: '100%',
            placeholder: placeholder,
            allowClear: true,
            ajax: {
                url: url,
                dataType: 'json'
            }
        });
    });
});
</script>
@endpush