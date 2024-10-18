<?php

namespace Nahad\Foundation\Dashboard\View\Components;

use Illuminate\View\Component;
use Nahad\Foundation\Dashboard\Support\Breadcrumber;

class Breadcrumbs extends Component
{
    public $entity;
    public $root;
    private $isDashboard;
    public function __construct($entity, $isDashboard = false, $root = null)
    {
        $this->entity = $entity;
        $this->root = $root;
        $this->isDashboard = $isDashboard;
    }

    public function render()
    {
        $links = Breadcrumber::links();

        if(!$this->root) {
            if($this->isDashboard) {
                $this->root = [
                    'title' => 'داشبورد',
                    'icon' => 'fas fa-tachometer-alt fa-sm',
                    'url' => '/dashboard',
                ];
            }
        }

        return view('dashboard::components.breadcrumbs', [
            'links' => $links
        ]);
    }


}
