<?php

namespace Nahad\Foundation\Dashboard\Support\Livewire;

trait WithFilters {
    public function mountWithFilters() {
        $this->filters = [];

        collect($this->filterModel::filters())->where('type', 'select')->each(function($filter, $name) {
            $this->filters[$name] = [];
        });
    }

    public function applyFilters() {
        $this->dispatch('filters-applied');
    } 

    public function resetFilters() {
        $this->reset('filters');

        $this->dispatch('filters-reset');
    } 
}