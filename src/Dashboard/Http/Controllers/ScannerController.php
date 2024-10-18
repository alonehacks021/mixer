<?php

namespace Nahad\Foundation\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScannerController extends Controller
{

    public function index() {
        return view('dashboard::scanner.index');
    }
}
