<div class="row mb-2">
    <div class="col">
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input check-all" id="check-all-{{$section}}"
                    data-section="{{$section}}"/>
                <label class="custom-control-label" for="check-all-{{$section}}">همه</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($filters as $name => $filter)
    <div class="form-group mb-0 col-12 col-sm-4 col-md-3" id="report-section-{{$section}}">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input filter" id="{{$name}}" wire:model.defer="columns" value="{{$name}}"/>
            <label class="custom-control-label" for="{{$name}}">{{$filter['label'] ?? $name}}</label>
        </div>
    </div>
    @endforeach
    @foreach ($columns as $name => $column)
    <div class="form-group mb-0 col-12 col-sm-4 col-md-3" id="report-section-{{$section}}">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input filter" id="{{$name}}" wire:model.defer="columns" value="{{$name}}"/>
            <label class="custom-control-label" for="{{$name}}">{{$column['label'] ?? $name}}</label>
        </div>
    </div>
    @endforeach
</div>