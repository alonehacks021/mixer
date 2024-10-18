<?php

namespace Nahad\Foundation\Dashboard\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PersianCharacters
{
    public function handle(Request $request, Closure $next)
    {
        $data = $request->all();

        if($request->is('livewire/*')) {
            $request->merge([
                'updates' => $this->checkCharacters($data['updates'] ?? []),
            ]);
        }
        else {
            $request->replace($this->checkCharacters($data));
        }

        return $next($request);
    }

    private function checkCharacters($data) {
        foreach($data as $key => $value) {
            if(is_null($value) || is_bool($value)) {
                $data[$key] = $value;
            }
            else if(is_array($value)) {
                $data[$key] = $this->checkCharacters($value);
            }
            else {
                if(!is_numeric($data[$key]) && !is_null($data[$key])) {
                    $data[$key] = str_replace([
                        'ك', 'ي' , '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'
                    ], [
                        'ک', 'ی' , '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
                    ], $value);
                }
            }
        }

        return $data;
    }
}
