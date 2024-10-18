<?php

namespace Nahad\Foundation\Auth\Support;

class UserMenu {
    private static $items = [];

    public static function addItem($title, $url) {
        self::$items[] = [
            'title' => $title,
            'url' => $url
        ];
    }

    public static function items() {
        return self::$items;
    }
}