<?php

// Menu Attributes

// navigate:bool            use livewire navigate (required if submenu not exists)
// icon:string              menu icon (fontawesome prefered)
// url:string               absolute address for external links (one of url or path or route required and other ignored, priority: route,path,url)
// path:string              relative address for internal links (one of url or path or route required and other ignored, priority: route,path,url)
// route:string             laravel route name (one of url or path or route required and other ignored, priority: route,path,url)
// policy:{method, model}   laravel policy
// submenu:array            a set og menus without icon

return [
    'sidebar' => [],
];