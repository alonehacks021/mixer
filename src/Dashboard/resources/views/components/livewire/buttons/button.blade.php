<button type="{{$type ?? 'button'}}" 
    class="btn btn-{{$btn ?? null}} btn-{{$size ?? null}} {{$class ?? null}}" 
    title="{{$title ?? null}}" 
    {!! ($click ?? null) ? 'wire:click="' . $click . '"' : null !!}
    x-on:click="{{$jsclick ?? null}}"
    data-bs-toggle="{{$toggle ?? null}}"
    data-bs-target="#{{$bsTarget ?? null}}"
    wire:loading.attr="disabled"
    id="{{$id ?? \Str::random(10)}}"
    >

    <span wire:loading.remove wire:target="{{$target ?? $click ?? null}}">
        <i class="{{$icon ?? null}}"></i>
        {{$slot ?? null}}
    </span>

    <span wire:loading wire:target="{{$target ?? $click ?? null}}">
        <i class="fa-solid fas fa-spinner fa-spin"></i>
        لطفا صبر کنید
    </span>
</button>