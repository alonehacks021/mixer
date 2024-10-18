<?php

namespace Nahad\Foundation\Auth\Services;

use GuzzleHttp\Client;

class SpecialService {
    private static $client = null;
    private static $token = null;
    private static $latestMessage = null;

    private static function client() {
        if(!self::$client) {
            self::$client = new Client([
                'base_uri' => config('auth.auth_api_special_url'),
                'timeout'  => config('auth.auth_api_special_timeout'),
                'http_errors' => false,
                'verify' => false,
            ]);
        }

        return self::$client;
    }

    public static function getToken() {
        return self::$token;
    }

    public static function setToken($token) {
        self::$token = $token;
    }

    public static function getLatestMessage() {
        return self::$latestMessage;
    }

    public static function login() {
        $response = self::client()->post('v1/Users/PasswordCredentials', [
            'form_params' => [
                'username' => config('auth.auth_api_special_username'),
                'password' => config('auth.auth_api_special_password'),
                'client_id' => config('auth.auth_api_special_client_id'),
                'client_secret' => config('auth.auth_api_special_client_secret'),
                'grant_type' => 'password',
                'scope' => 'login send_sms personnel_list inquiry_shahkar',
            ]
        ]);

        if($response->getStatusCode() == 200) {
            $result = json_decode($response->getBody()->getContents());

            if($result->state == 'ok') {
                self::$token = $result->data->access_token ?? null;

                return $result->data->username;
            }
        }

        return null;
    }

    public static function resetToken() {
        self::$token = null;
    }

    public static function createUser($data) {
        if(!self::$token) {
            try {
                self::login();
            }
            catch(\Exception $exception) {
                self::$latestMessage = 'ارتباط با سامانه کاربران برقرار نشد';
                return false;
            }
        }

        $response = self::client()->post('v1/Users', [
            'form_params' => [
                'user_mobile' => $data['mobile'],
                'name' => $data['first_name'],
                'family' => $data['last_name'],
                'national_code' => $data['national_code'],
            ],
            'headers' => [
                'Authorization' => self::$token,
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $result = json_decode($response->getBody()->getContents());

        $data = false;

        if(in_array($statusCode, [200])) {
            if($result->state == 'ok') {
                if($result->data->password ?? null) {
                    $data = [
                        'exists' => false,
                        'password' => $result->data->password,
                    ];
                }
                else {
                    $data = [
                        'exists' => true,
                    ];
                }
            }
        }
        else {
            self::$latestMessage = $result->description ?? 'Error';
        }

        self::$token = null;

        return $data;
    }

    public static function updateUser($oldUserMobile, $data) {
        if(!self::$token) {
            try {
                self::login();
            }
            catch(\Exception $exception) {
                self::$latestMessage = 'ارتباط با سامانه کاربران برقرار نشد';
                return false;
            }
        }

        $response = self::client()->put('v1/Users/' . $oldUserMobile . '/Profile', [
            'form_params' => [
                'user_mobile' => $data['mobile'],
                'name' => $data['first_name'],
                'family' => $data['last_name'],
                'national_code' => $data['national_code'],
            ],
            'headers' => [
                'Authorization' => self::$token,
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $result = json_decode($response->getBody()->getContents());
// dd($result);
        if(in_array($statusCode, [200])) {
            if($result->state == 'ok') {
                return true;
            }
        }
        else {
            self::$latestMessage = $result->description ?? 'Error';
        }

        return false;
    }

    public static function groups($groupName = null, $parentId = null) {
        if(!self::$token) {
            try {
                self::login();
            }
            catch(\Exception $exception) {
                self::$latestMessage = 'ارتباط با سامانه کاربران برقرار نشد';
                return false;
            }
        }

        $response = self::client()->get('v1/Common/DataValues', [
            'form_params' => [
                'group_name' => $groupName,
                'parent_id' => $parentId,
            ],
            'headers' => [
                'Authorization' => self::$token,
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $result = json_decode($response->getBody()->getContents());

        if(in_array($statusCode, [200])) {
            if($result->state == 'ok') {
                return $result;
            }
        }
        else {
            self::$latestMessage = $result->description ?? 'Error';
        }

        return false;
    }

    public static function isValidUser($nationalCode, $mobile) {
        if(!self::$token) {
            try {
                self::login();
            }
            catch(\Exception $exception) {
                self::$latestMessage = 'ارتباط با سامانه کاربران برقرار نشد';
                return false;
            }
        }

        try {
            $response = self::client()->post('v1/Systems/Shahkar', [
                'form_params' => [
                    'user_mobile' => $mobile,
                    'national_code' => $nationalCode,
                ],
                'headers' => [
                    'Authorization' => self::$token,
                ],
            ]);
        }
        catch (\Exception $e) {
            return false;
        }

        $statusCode = $response->getStatusCode();
        $result = json_decode($response->getBody()->getContents());

        self::$token = null;

        if(in_array($statusCode, [200])) {
            if($result->state == 'ok') {
                return true;
            }
        }
        else {
            self::$latestMessage = $result->description ?? 'Error';
        }

        return false;
    }
}
