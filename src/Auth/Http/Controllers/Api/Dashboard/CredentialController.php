<?php

namespace Nahad\Foundation\Auth\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nahad\Foundation\Auth\Services\AuthService;

class CredentialController extends Controller
{
    public function check(Request $request) {
        return [
            'result' => AuthService::lastCredentialCheck()
        ];
    }
}
