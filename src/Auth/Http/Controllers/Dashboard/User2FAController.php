<?php

namespace Nahad\Foundation\Auth\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Nahad\Foundation\Auth\Models\User;
use Illuminate\Http\Request;

class User2FAController extends Controller {

    public function index(Request $request, User $user) {
        $this->authorize('_2fa', $user);

        $verifyCodes = $user->verifyCodes()
            ->latest('id')
            ->paginate(50);

        return view('auth::dashboard.user.verify-code.index', [
            'user' => $user,
            'verify_codes' => $verifyCodes
        ]);
    }
}