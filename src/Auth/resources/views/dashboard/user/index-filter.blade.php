@php
use Nahad\Auth\Models\User;
@endphp

<div class="row">
    <div class="col-12">
        @component('dashboard::components.filter', [
            'filters' => User::filters()
        ])
            
        

        @endcomponent
    </div>
</div>