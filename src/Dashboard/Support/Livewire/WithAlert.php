<?php

namespace Nahad\Foundation\Dashboard\Support\Livewire;

trait WithAlert {
    private function alert(string $icon, string|array $messages, string|null $title = null) {
        $this->dispatch('alert', [
            'icon' => $icon,
            'messages' => $messages,
            'title' => $title,
        ]);
    } 
}