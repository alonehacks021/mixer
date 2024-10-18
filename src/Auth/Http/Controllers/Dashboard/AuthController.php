<?php

namespace Nahad\Foundation\Auth\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Nahad\Foundation\Auth\Http\Requests\Dashboard\LoginRequest;
use Nahad\Foundation\Auth\Models\User;
use Nahad\Foundation\Auth\Models\VerifyCode;
use Nahad\Foundation\Dashboard\Support\Alert;
use Nahad\Foundation\Dashboard\Models\Option;
use Illuminate\Http\Request;
use Nahad\Foundation\Auth\Events\DashboardLoginFail;
use Nahad\Foundation\Auth\Events\DashboardLoginSuccess;
use Nahad\Foundation\Auth\Events\UserLogout;
use Nahad\Foundation\Auth\Services\VerifyCodeService;

class AuthController extends Controller {
    public function loginGet() {
        if(\Auth::check()) {
            return redirect('dashboard');
        }

        return view('auth::dashboard.login');
    }

    public function loginPost(LoginRequest $request) {
        $user = User::where([
            'username' => $request->username,
            'ldap_login' => false
        ])->first();

        $cache = cache()->driver('database');

        $attempts = $cache->get("failed-login:{$request->username}");
        if($attempts >= config('auth.max_login_attempts', 3)) {
            $user?->update([
                'status' => User::STATUS_BAN,
            ]);

            $cache->forget("failed-login:{$request->username}");

            Alert::add('به دلیل افزایش تلاش های ناموفق شما، حساب کاربری مورد نظر مسدود گردید.', Alert::DANGER);

            return redirect()->back();
        }

        if($user) {
            if($user->isBan()) {
                Alert::add('حساب کاربری مسدود می باشد', Alert::DANGER);

                return back();
            }

            if(\Hash::check($request->password, $user->password)) {
                DashboardLoginSuccess::dispatch($user);

                if ( config('auth.enabled_2fa', true)){
                    $verifyCode = VerifyCodeService::send($user);

                    return redirect()->route('verify-user')
                        ->withCookie(cookie('2fa', encrypt($verifyCode->hash), config('auth.verify_code_session_expiration_time')));
                }else{
                    Auth::loginUsingId($user->id);
                    return redirect()->to('/dashboard');

                }
            }
        }

        DashboardLoginFail::dispatch($request->username, $user);

        Alert::add('نام کاربری یا رمزعبور اشتباه است', Alert::DANGER);

        return redirect()->back()->withInput();
    }

    public function verifyGet($hashCode) {
        if(\Auth::check()) {
            return redirect('dashboard');
        }

        return view('auth::dashboard.verify', [
            'hash_code' => $hashCode
        ]);
    }

    public function logout(Request $request) {
        $user = $request->user();

        if(!$user) {
            return redirect()->back();
        }

        UserLogout::dispatch($user);

        auth()->logout();

        if($user->isAdmin()) {
            //return redirect()->to('/dashboard/auth/login');
            return redirect()->route('login');
        }
        
        return redirect()->away(config('auth.logout_redirect'));
    }
}