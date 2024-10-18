<?php

namespace Nahad\Foundation\Auth\Http\Livewire\Dashboard;

use Livewire\Component;
use Nahad\Foundation\Auth\Models\CredentialHistory;
use Nahad\Foundation\Auth\Services\AuthService;
use Nahad\Foundation\Dashboard\Foundation\Livewire\Events;

class CredentailCheck extends Component
{
    use Events;

    public string|null $title;
    public string|null $btn;
    public string|null $class;
    public string|null $icon;

    public function render()
    {
        return view('auth::livewire.dashboard.credential-check');
    }

    public function check() {
        if(AuthService::lastCredentialCheck()) {
            $this->dispatchBrowserEvent('trusted-credential');
        }
        else {
            $this->dispatchBrowserEvent('untrusted-credential');
        }
    }
}
