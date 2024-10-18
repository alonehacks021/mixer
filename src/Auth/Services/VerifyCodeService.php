<?php

namespace Nahad\Foundation\Auth\Services;

use Nahad\Foundation\Auth\Models\VerifyCode;
use Nahad\Foundation\Notification\Services\SmsService;
use Nahad\Foundation\Notification\Services\NotificationService;
use Illuminate\Support\Facades\Hash;
use Nahad\Foundation\Auth\Models\User;

class VerifyCodeService {
    public static function remainingTime() {
        $verifyCode = self::getVerifyCode();

        return $verifyCode ? ($verifyCode->expired_at->timestamp - now()->timestamp) : 0;
    } 

    public static function mobile() {
        $verifyCode = self::getVerifyCode();

        return $verifyCode ? substr($verifyCode->user?->mobile, 0, 4) . str_repeat('*', 4) . substr($verifyCode->user?->mobile, 7) : '';
    } 

    public static function isValid() {
        $verifyCode = self::getVerifyCode();

        return ($verifyCode && (!self::isExpiredSession($verifyCode))) ? true : false;
    } 

    public static function currentSessionAttempts() {
        $verifyCode = self::getVerifyCode();

        return $verifyCode->attempts;
    }

    public static function useMaxSessionAttempts() {
        return VerifyCodeService::currentSessionAttempts() >= config('auth.verify_code_max_attempts');
    }

    public static function useMaxAttemptChecks() {
        $verifyCode = self::getVerifyCode();

        return $verifyCode && ($verifyCode->checks >= config('auth.verify_code_max_checks'));
    }

    public static function hasActiveCode(): bool {
        $verifyCode = self::getVerifyCode();

        return $verifyCode ? $verifyCode->expired_at->greaterThan(now()) : false;
    }

    public static function checkCodeExpired(): bool {
        $verifyCode = self::getVerifyCode();

        return $verifyCode ? $verifyCode->expired_at->lessThan(now()) : true;
    }

    public static function codeVerified(): void {
        $verifyCode = self::getVerifyCode();

        auth()->loginUsingId($verifyCode->user_id);

        $verifyCode->update([
            'verified_at' => now()->toDateTimeString(),
        ]);

        $date = jdate()->format('%A Y/m/d');
        $time = jdate()->format('H:i:s');
        $app = env('APP_NAME');
        if(config('auth.send_mobile_notification',true)){
            NotificationService::notifyToUser($verifyCode->user, 'اطلاع رسانی', "شما در تاریخ {$date} ساعت {$time} به {$app} وارد شدید");
        }
    }

    public static function checkCodeValid(string $code): bool {
        $verifyCode = self::getVerifyCode();

        if($verifyCode->code == $code) {
            return true;
        }

        $verifyCode->update([
            'checks' => $verifyCode->checks + 1
        ]);

        return false;
    }

    private static function getVerifyCode() {
        return cache()->driver('array')->rememberforever('v-c-u', function() {
            $hash = null;
            try {
                $hash = decrypt(request()->cookie('2fa'));
            }
            catch(\Exception $exception) {}

            if(!$hash) {
                return null;
            }

            $verifyCode = VerifyCode::where([
                'hash' => $hash,
                'verified_at' => null,
            ])
            ->first();

            if(!$verifyCode) {
                return null;
            }
            
            if(self::isExpiredSession($verifyCode)) {
                return null;
            }

            return $verifyCode;
        });
    }

    public static function send(User $user): VerifyCode {
        $verifyCode = VerifyCode::create([
            'user_id' => $user->id,
            'code' => self::generateCode(),
            'hash' => self::generateHash($user->id),
            'expired_at' => now()->addMinutes(config('auth.verify_code_expiration_time'))->toDateTimeString(),
        ]);

        SmsService::sendToUsers(str_replace('[کد]', $verifyCode->code, get_option('two_step_login_sms', '[کد]')), collect([$user]), null, true);

        return $verifyCode;
    }

    public static function resend(): void {
        $verifyCode = self::getVerifyCode();

        if($verifyCode && (!self::isExpiredSession($verifyCode))) {
            $verifyCode->update([
                'code' => self::generateCode(),
                'attempts' => $verifyCode->attempts + 1,
                'checks' => 0,
                'expired_at' => now()->addMinutes(config('auth.verify_code_expiration_time'))->toDateTimeString(),
            ]);
        }

        SmsService::sendToUsers(str_replace('[کد]', $verifyCode->code, get_option('two_step_login_sms', '[کد]')), collect([$verifyCode->user]), null, true);
    }

    private static function generateCode() {
        return env('APP_ENV') == 'local' ? '12345' : rand(11111, 99999);
    }

    private static function generateHash($userId) {
        return Hash::make(self::generateKey($userId));
    }

    private static function generateKey($userId) {
        $randomString = \Str::random(256);
        $date = now()->toDateTimeString();
        $ip = request()->ip();

        return "{$userId}:{$randomString}:{$date}:{$ip}";
    }

    private static function isExpiredSession(VerifyCode $verifyCode) {
        return $verifyCode->created_at->addMinutes(config('auth.verify_code_session_expiration_time'))->lessThan(now());
    }
}