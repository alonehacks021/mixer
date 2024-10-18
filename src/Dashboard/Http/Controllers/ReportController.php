<?php

namespace Nahad\Foundation\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nahad\Foundation\Dashboard\Support\Alert;
use Nahad\Foundation\Dashboard\Support\Value;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Collection;

class ReportController extends Controller {

    public function download(Request $request) {
        $model = $request->get('model');

        if(!$model || !class_exists($model)) {
            return abort(404);
        }

        $this->authorize('report', $model);

        $report = $model::reportOptions();
        $columns = $request->get('columns', []);
        $modelColumns = $report['columns'];

        if(count(array_diff(array_values($columns), array_column($modelColumns, 'name'))) > 0) {
            return abort(403);
        }

        $modelColumns = collect($modelColumns)
            ->keyBy('name')
            ->toArray();

        ///////////////////////////////////////////

        switch($request->get('report_type')) {
            case 'excel': {
                $records = $model::getReport()->get();
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet()
                    ->setRightToLeft(true);

                //ثبت نام ستون ها
                $count = 1;
                foreach($columns as $lang => $column) {
                    $sheet->setCellValueByColumnAndRow($count++, 1, trans($lang));
                }

                //مقدار دهی
                foreach($records as $key => $record) {
                    $count = 1;//شمارنده ستون
                    foreach($columns as $column) {
                        $value = Value::traverse($record, $column);
                        if($value instanceof Collection) {
                            $sheet->setCellValueByColumnAndRow($count, $key + 2, $value->implode($modelColumns[$column]['column'], ', '));
                        }
                        else if (isset($modelColumns[$column]['consts'])) {
                            if(!empty($value)) {
                                $sheet->setCellValueByColumnAndRow($count, $key + 2, trans($modelColumns[$column]['consts'] . '.' . $value));
                            }
                        }
                        else if (\DateTime::createFromFormat('Y-m-d H:i:s', $value) !== false) {
                            $sheet->setCellValueByColumnAndRow($count, $key + 2, jdate()->fromDateTime($value)->format('Y/m/d H:i'));
                        }
                        else {
                            $sheet->setCellValueByColumnAndRow($count, $key + 2, $value);
                        }

                        ++$count;
                    }
                }

                $date = jdate()->format('Y_m_d-H_i');
                $name = $report['name'] ?? 'گزارش';
                header("Content-Disposition: attachment; filename={$name}-{$date}.xlsx;");
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
                break;
            }
            case 'csv': {
                $records = $model::getReport()->get();
                $date = jdate()->format('Y_m_d-H_i');
                $name = $report['name'] ?? 'گزارش';

                header("Content-Disposition: attachment; filename={$name}-{$date}.csv;");
                header("Content-Type: text/csv; charset=UTF-8");

                $output = fopen('php://output', 'wb');
                ob_end_clean();
                fwrite($output, "\xEF\xBB\xBF");

                //ثبت نام ستون ها
                $count = 1;
                $line = [];
                foreach($columns as $lang => $column) {
                    $line[] = trans($lang);
                }
                fputcsv($output, $line);

                //مقدار دهی
                foreach($records as $key => $record) {
                    $line = [];
                    $count = 1;//شمارنده ستون
                    foreach($columns as $column) {
                        $value = Value::traverse($record, $column);
                        if($value instanceof Collection) {
                            $line[] = $value->implode($modelColumns[$column]['column'], ', ');
                        }
                        else if (isset($modelColumns[$column]['consts'])) {
                            if(!empty($value)) {
                                $line[] = trans($modelColumns[$column]['consts'] . '.' . $value);
                            }
                            else {
                                $line[] = '';
                            }
                        }
                        else if (\DateTime::createFromFormat('Y-m-d H:i:s', $value) !== false) {
                            $line[] = jdate()->fromDateTime($value)->format('Y/m/d H:i');
                        }
                        else {
                            $line[] = $value;
                        }

                        ++$count;
                    }

                    fputcsv($output, $line);
                }

                exit;
            }
        }
    }
}