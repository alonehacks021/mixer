<div class="input-group input-group-solid mb-5 date" data-date-id="{{$dateId = \Str::random(32)}}" wire:ignore>
    <div class="input-group-text">
        <i class="fa-solid fa-calendar"></i>
    </div>
    <input type="hidden" id="input-{{$dateId}}" x-ref="i{{$dateId}}" x-on:change="(event) => { @this.set('filters.{{$name}}', event.target.value, false) }"/>
    <input type="text" class="form-control"  x-ref="t{{$dateId}}" id="text-{{$dateId}}" readonly/>
    <button class="btn btn-icon btn-light-danger" type="button" x-on:click="() => { @this.set('filters.{{$name}}', null, false); $refs.i{{$dateId}}.value = $refs.t{{$dateId}}.value = null; }">
        <i class="fa-solid fa-trash-alt"></i>
    </button>
</div>