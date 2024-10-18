<?php

namespace Nahad\Foundation\Auth\Services;

use Nahad\Foundation\Dashboard\Support\Alert;
use GuzzleHttp\Client;
use Nahad\Foundation\Auth\Events\UserForwardedToEc;
use Nahad\Foundation\Auth\Models\User;

class EcService {
    private static $client = null;
    private static $token = null;
    private static $latestMessage = null;

    private static function client() {
        if(!self::$client) {
            self::$client = new Client([
                'base_uri' => config('auth.ec_service_url'),
                'timeout'  => config('auth.ec_service_timeout'),
                'http_errors' => false,
                'verify' => false,
            ]);
        }

        return self::$client;
    }

    private static function login() {
        if(!self::$client) {
            self::$client = self::client();
        }

        $response = self::client()->post('api/auth', [
            'json' => [
                'username' => config('auth.ec_service_username'),
                'password' => config('auth.ec_service_password'),
            ],
        ]);

        $result = json_decode($response->getBody()->getContents());
        if($response->getStatusCode() == 200) {
            self::$token = $result->result->token ?? null;
        }
        else {
            self::$latestMessage = $result->description;
        }
    }

    private static function register($data) {
        if(!self::$token) {
            self::login();
        }

        if(self::$token) {
            $response = self::client()->post('/api/user/login-easy', [
                'json' => array_merge($data, [
                    'token' => self::$token,
                ]),
            ]);

            $result = json_decode($response->getBody()->getContents());
            if($response->getStatusCode() == 200) {
                return $result->result->reference_url ?? null;
            }
            else {
                self::$latestMessage = $result->description;
                self::$latestMessage .= '. ' . implode('. ', \Arr::flatten(\Arr::pluck($result->error_info ?? [], '*')));
            }
        }

        return null;
    }

    public static function forward($user, $extra = []) {
        $referenceUrl = self::register([
            'national_id' => $extra['national_code'] ?? $user->meta->national_code ?? null, 
            'name' => $user->first_name,
            'family' => $user->last_name,
            'mobile' => $user->mobile,
            'actor' => 4, 
            'sex' => ($user->gender == User::GENDER_MALE) ? '1' : '0',
        ]);

        if($referenceUrl) {
            UserForwardedToEc::dispatch($user);

            return redirect()->away($referenceUrl);
        }

        Alert::add(self::$latestMessage, Alert::WARNING);

        return redirect()->back();
    }
}