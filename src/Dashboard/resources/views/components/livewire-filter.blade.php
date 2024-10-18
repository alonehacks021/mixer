<div class="row">
    @foreach ($filters ?? [] as $name => $filter)
        @php
        $type = is_array($filter) ? $filter['type'] : $filter;
        $label = $filter['label'] ?? null;
        @endphp
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
                        wire:model.defer="data.{{$name}}"
                        placeholder="{{$label}}"/>
                </div>
                @break
            @case('number')
                <div class="col-12 col-sm-6 col-md-4">
                    <input type="number" class="form-control mb-2" name="{{$name}}" 
                        wire:model.defer="data.{{$name}}"
                        placeholder="{{$label}}"/>
                </div>
                @break
            @case('select')
                <div class="col-12 col-sm-6 col-md-4">
                    <select class="custom-select mb-2" wire:model.defer="data.{{$name}}" placeholder="{{$label}}">
                        <option value="-1">انتخاب/{{$label}}</option>
                        @foreach ($filter['items'] ?? [] as $id => $item)
                        <option value="{{$id}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                @break
            @case('date')
                <div class="col-12 col-sm-6 col-md-4" wire:ignore>
                    <div class="input-group mb-2" id="date-{{$name}}">
                        <div class="input-group-prepend">
                            <button class="btn btn-dark" type="button"  id="date-{{$name}}-btn">
                                <i class="fas fa-calendar"></i>
                            </button>
                        </div>
                        <input type="hidden" name="{{$name}}" value="{{$data[$name] ?? null}}" id="date-{{$name}}-date"/>
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

                    $('#date-{{$name}}-date').on('change', function() {
                        @this.set('data.{{$name}}', $(this).val(), true);
                    });
                });
                </script>
                @endpush
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
    @endforeach
</div>