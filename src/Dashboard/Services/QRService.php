<?php

namespace Nahad\Foundation\Dashboard\Services;

use chillerlan\QRCode\QRCode;

class QRService {
    public static function generate(string $data): string {
        return (new QRCode)->render($data);
    }

    public static function command(string $action, ...$data): string {
        $action = strtoupper($action);
        $data = \Arr::join($data, ';;');

        return (new QRCode)->render("$action:$data");
    }

    public static function info($action): array | null {
        $QRTools = resource_path('tools/QR.php');

        if(!file_exists($QRTools)) {
            return null;
        }

        $commands = include_once $QRTools;

        return \Arr::first($commands, function(array $command, int $key) use ($action) {
            return $action == $command['action'];
        });
    }
}