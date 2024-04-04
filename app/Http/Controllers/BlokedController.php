<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlokedController extends Controller
{
    public function index()
    {
        return view('blocked.index');
    }
}
