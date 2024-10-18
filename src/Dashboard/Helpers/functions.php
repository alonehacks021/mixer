<?php

use Nahad\Foundation\Dashboard\Models\Option;
use Nahad\Foundation\Dashboard\Support\Alert;
use Nahad\Foundation\Dashboard\Support\PageInfo;

if(!function_exists('trans_array')) {
    function trans_array($name) {
        $value = trans($name);
        
        return is_array($value) ? $value : [];
    }
}

if(!function_exists('set_page_title')) {
    function set_page_title($title) {
        PageInfo::setPageTitle($title);
    }
}

if(!function_exists('get_page_title')) {
    function get_page_title() {
        return PageInfo::getPageTitle();
    }
}

if(!function_exists('get_option')) {
    function get_option($name, $default = null, $userId = null) {
        return Option::get($name, $default, $userId);
    }
}

if(!function_exists('get_option_array')) {
    function get_option_array($name, $default = [], $userId = null) {
        return Option::getArray($name, $default, $userId);
    }
}

if(!function_exists('set_option')) {
    function set_option($name, $value, $userId = null) {
        return Option::set($name, $value, $userId);
    }
}

if(!function_exists('set_option_array')) {
    function set_option_array($name, $value, $userId = null) {
        return Option::setArray($name, $value, $userId);
    }
}

if(!function_exists('convert_characters')) {
    function convert_characters($value) {
        return str_replace([
            'ي', 'ك', 'ة','۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'
        ], [
            'ی', 'ک','ه','0', '1', '2', '3', '4', '5', '6', '7', '8','9', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        ], $value);
    }
}

if(!function_exists('alert_add')) {
    function alert_add($message, $type) {
        return Alert::add($message, $type);
    }
}

if(!function_exists('alert_all')) {
    function alert_all() {
        return Alert::all();
    }
}

if(!function_exists('alert_count')) {
    function alert_count() {
        return Alert::count();
    }
}

if(!function_exists('alert_add_to_channel')) {
    function alert_add_to_channel($channel, $message, $type) {
        return Alert::addToChannel($channel, $message, $type);
    }
}

if(!function_exists('alert_all_from_channel')) {
    function alert_all_from_channel($channel) {
        return Alert::allFromChannel($channel);
    }
}

if(!function_exists('alert_count_from_channel')) {
    function alert_count_from_channel($channel) {
        return Alert::countFromChannel($channel);
    }
}

if(!function_exists('word_rtl')) {
    function word_rtl($value) {
        return "<w:p><w:r><w:rPr><w:rtl /></w:rPr><w:t>{$value}</w:t></w:r></w:p>";
    }
}