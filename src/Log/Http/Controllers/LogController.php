<?php

namespace Nahad\Foundation\Log\Http\Controllers;

use App\Http\Controllers\Controller;
use Nahad\Foundation\Dashboard\Models\Dashboard;
use Nahad\Foundation\Log\Models\Log;

class LogController extends Controller {
    public function index() {
        $this->authorize('logs', Log::class);

        $logs = Log::latest('id');

        $hash = request('hash');
        if($hash) {
            $logs = $logs->whereRelation('alerts', 'hash', $hash);
        }

        $logs = $logs->filter()
            ->paginate(100)
            ->withQueryString();
        
        return view('log::log.index', [
            'logs' => $logs
        ]);
    }
}