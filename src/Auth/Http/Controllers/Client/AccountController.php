<?php

namespace Nahad\Foundation\Auth\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller {
    public function account(Request $request) {
        return view('auth::client.account', [
            'user' => $request->user(),
        ]);
    }
}