<?php

namespace Nahad\Foundation\Dashboard\Services;

class ExcelService {
    public static function coordinate(int $column, int $row): string {
        $cellName = '';

        // Convert column number to Excel column name
        while ($column > 0) {
            $modulo = ($column - 1) % 26;
            $cellName = chr(65 + $modulo) . $cellName;
            $column = intval(($column - $modulo) / 26);
        }

        // Combine column name and row number
        $cellName .= $row;

        return $cellName;
    }
}