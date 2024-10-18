<?php 

namespace Nahad\Foundation\Dashboard\Support;

class Breadcrumber {
    public static function links() {
        $segments = $groups = null;

        $breadcrumbs = base_path('routes/breadcrumbs.php');
        if(file_exists($breadcrumbs)) {
            $groups = include $breadcrumbs;
        }

        if($groups) {
            $segments = self::getCurrentRouteNameSegments();
        }

        $links = [];
        if($segments && $groups) {
            foreach($segments as $index => $segment) {
                $group = $groups[$segment] ?? null;

                if($group) {
                    $links[$index] = [
                        'title' => $group['title'] ?? null,
                        'traverse' => $group['traverse'] ?? null,
                        'url' => $group['url'] ?? null,
                        'icon' => $group['icon'] ?? null,
                    ];

                    $groups = $group['children'] ?? [];
                }
                else {
                    break;
                }
            }
        }

        return $links;
    }

    private static function getCurrentRouteNameSegments() {
        return cache()->driver('array')->rememberForever('crns', function() {
            $name = \Route::currentRouteName();

            return explode('.', $name);
        });
    }
}