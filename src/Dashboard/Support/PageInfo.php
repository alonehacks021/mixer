<?php

namespace Nahad\Foundation\Dashboard\Support;

class PageInfo {
    private static $pageTitle = null;
    private static $dashboardTitle = null;

    public static function setPageTitle($title) {
        self::$pageTitle = $title;
    }

    public static function getPageTitle() {
        return self::$pageTitle;
    }

    public static function setDashboardTitle($title) {
        self::$dashboardTitle = $title;
    }

    public static function getDashboardTitle() {
        return self::$dashboardTitle ?? env('APP_NAME');
    }
}