@php
use Nahad\Auth\Models\Role;
@endphp

<div class="row">
    <div class="col-12">
        @component('dashboard::components.filter', [
            'filters' => Role::filters()
        ])
            
        

        @endcomponent
    </div>
</div>