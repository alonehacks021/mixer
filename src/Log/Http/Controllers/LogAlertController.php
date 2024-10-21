<?php

namespace Nahad\Foundation\Log\Http\Controllers;

use App\Http\Controllers\Controller;
use Nahad\Foundation\Dashboard\Models\Dashboard;
use Nahad\Foundation\Log\Models\Log;
use Nahad\Foundation\Log\Models\LogAlert;
use Nahad\Foundation\Dashboard\Support\Alert;

class LogAlertController extends Controller {
    public function index() {
        $this->authorize('alerts', Log::class);

        $logAlerts = LogAlert::withCount('logs')
            ->latest('updated_at')
            ->filter()
            ->paginate(30)
            ->withQueryString();
        
        return view('log::log-alert.index', [
            'log_alerts' => $logAlerts
        ]);
    }

    public function done(LogAlert $logAlert) {
        $this->authorize('alertsDone', [Log::class, $logAlert]);

        $logAlert->update([
            'done' => true,
        ]);

        Alert::add('پیگیری هشدار با موفقیت انجام شد', Alert::SUCCESS);

        return back();
    }
}