<button
    type="button" 
    class="btn btn-{{$btn ?? null}} btn-{{$size ?? null}} btn-icon {{$class ?? null}} " 
    title="{{$title ?? null}}" 
    wire:click="{{$click ?? null}}"
    x-on:click="{{$jsClick ?? null}}"
    data-bs-toggle="{{$toggle ?? null}}"
    data-bs-target="#{{$bsTarget ?? null}}"
    wire:loading.attr="disabled"
    >

    <span wire:loading.remove wire:target="{{$target ?? $click ?? null}}">
        <i class="{{$icon ?? null}}"></i>
    </span>

    <span wire:loading wire:target="{{$target ?? $click ?? null}}">
        <i class="fa-solid fas fa-spinner fa-spin"></i>
    </span>
</button>