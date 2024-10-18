<?php

namespace Nahad\Foundation\Dashboard\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class PdfService {
    public static function exportStream($path) {
        $file = fopen($path, 'r');

        $response = null;
        
        try {
            $response = Http::attach('file', $file, 'file.docx')->post('192.168.82.178/doc2pdf/doc2pdf.aspx');
        }
        catch(Exception $exception) {
            if(file_exists($path)) {
                unlink($path);
            }

            throw new Exception('PDF Generate: ' . $exception->getMessage());
        }
        
        if(file_exists($path)) {
            unlink($path);
        }

        return $response;
    }
}