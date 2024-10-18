<?php

namespace Nahad\Foundation\Auth\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Nahad\Foundation\Auth\Http\Requests\Dashboard\User\GenerateTokenRequest;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Dashboard\Support\Alert;

class UserTokenController extends Controller {

    public function tokens(User $user) {
        $this->authorize('tokens', $user);

        return view('auth::dashboard.user.tokens', [
            'user' => $user
        ]);
    }

    public function generate(GenerateTokenRequest $request, User $user) {
        $this->authorize('tokenCreate', $user);

        $token = $user->createToken($request->get('name'));

        return view('auth::dashboard.user.show-token', [
            'token' => $token
        ]);
    }

    public function destroy(User $user, $tokenId) {
        $this->authorize('tokenDelete', $user);

        $user->tokens()->where('id', $tokenId)->delete();

        Alert::add('توکن با موفقیت حذف گردید', Alert::SUCCESS);

        return redirect()->back();
    }
}