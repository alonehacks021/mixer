@if (count($items) <= 5)

@foreach ($items as $id => $item)

<div class="form-check form-check-custom form-check-solid mb-4">
    <input class="form-check-input" type="checkbox" value="{{$id}}" id="select-{{$name}}-{{$id}}" wire:model="filters.{{$name}}"/>
    <label class="form-check-label" for="select-{{$name}}-{{$id}}">{{$item}}</label>
</div>

@endforeach

@else

<div wire:ignore>
    <select class="form-select form-select-solid select2" data-placeholder="انتخاب" data-model="filters.{{$name}}" multiple>
    
        @foreach ($items as $id => $item)
        <option value="{{$id}}">{{$item}}</option>
        @endforeach

    </select>
</div>

@endif