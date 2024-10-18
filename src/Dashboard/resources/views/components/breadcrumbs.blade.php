@php
use Nahad\Dashboard\Support\Value;
@endphp

@if (count($links) > 0)

<nav aria-label="breadcrumb">
    <ol class="breadcrumb py-2">
        @if ($root)
        <li class="breadcrumb-item pr-0">
            <a href="{{$root['url']}}">
                @isset($root['icon'])
                <i class="{{$root['icon']}}"></i>    
                @endisset

                {{$root['title']}}
            </a>
        </li>
        @endif

        @foreach ($links as $link)
        @php
        $title = $link['title'];
        if(!$title && $link['traverse']) {
            $title = Value::traverse($entity, $link['traverse']);
        }
        @endphp

        @if ($title)
        <li class="breadcrumb-item pr-0 {{$loop->last ? 'active' : null}}">
            @if ($loop->last)
                @isset($link['icon'])
                <i class="{{$link['icon']}}"></i>    
                @endisset

            {{$title}}
            @else
            <a href="{{$link['url']}}">
                @isset($link['icon'])
                <i class="{{$link['icon']}}"></i>    
                @endisset
            
                {{$title}}
            </a>
            @endif
        </li>
        @endif
        @endforeach
    </ol>
</nav>   

@endif

