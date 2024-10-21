<?php

namespace Nahad\Foundation\Log\Http\Controllers;

use App\Http\Controllers\Controller;
use Nahad\Foundation\Log\Models\Log;
use Nahad\Foundation\Dashboard\Support\Alert;
use Nahad\Foundation\Log\Http\Requests\SettingsRequest;
use Nahad\Foundation\Auth\Models\User;

class SettingsController extends Controller {
    public function index() {
        $this->authorize('settings', Log::class);

        $alertUsers = User::whereIn('id', get_option_array('log_alert_users', []))
            ->get();
        
        return view('log::setting.index', [
            'alert_users' => $alertUsers,
        ]);
    }

    public function store(SettingsRequest $request) {
        $this->authorize('settings', Log::class);

        set_option('is_active_log', $request->boolean('is_active_log'));
        set_option('is_active_exception_alert_log', $request->boolean('is_active_exception_alert_log'));
        set_option_array('log_alert_users', $request->get('log_alert_users', []));
        
        Alert::add('بروزرسانی تنظیمات انجام شد', Alert::SUCCESS);

        return redirect()->back();
    }
}