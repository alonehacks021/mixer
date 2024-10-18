<?php

namespace Nahad\Foundation\Dashboard\Http\Livewire;

use Livewire\Component;
use Nahad\Foundation\Dashboard\Services\QRService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Nahad\Foundation\Dashboard\Models\Dashboard;

class Scanner extends Component
{
    use AuthorizesRequests;

    private $livewire;

    public function render()
    {
        $this->authorize('scanner', Dashboard::class);

        return view('dashboard::livewire.scanner');
    }

    public function decoded($action, $data)
    {
        $this->authorize('scanner', Dashboard::class);
        
        $info = QRService::info($action);
        $isLivewire2 = env('LIVEWIRE_VERSION', 2) == 2;
        $type = null;

        if (!$info) {
            $response = ['type' => 'error', 'message' => 'عملیات مورد نظر قابل انجام نمی‌باشد!'];

            $isLivewire2 ? $this->dispatchBrowserEvent('message', $response) : $this->dispatch('message', $response);
        } else {
            $handler = new $info['handler'];
            $response = $handler->handle($data);

            if (is_array($response)) {
                if($response['type'] == 'livewire') {
                    $this->livewire = $response;
                    $type = 'LIVEWIRE';
                }
                else {
                    $isLivewire2 ? $this->dispatchBrowserEvent('message', $response) : $this->dispatch('message', $response);
                    $type = 'MESSAGE';
                }
            } else if ($response instanceof View || $response instanceof Factory) {
                $isLivewire2 ? $this->dispatchBrowserEvent('view', $response->render()) : $this->dispatch('view', $response->render());
                $type = 'VIEW';
            } else {
                return $response;
            }
        }

        $isLivewire2 ? $this->dispatchBrowserEvent('scanned', $type) : $this->dispatch('scanned', $type);
    }
}
