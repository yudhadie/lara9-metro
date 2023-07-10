<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function admin()
    {
        return view('errors.admin');
    }

    public function active()
    {
        return view('errors.active');
    }
}
