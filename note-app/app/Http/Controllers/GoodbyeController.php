<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodbyeController extends Controller
{
    public function goodbye()
    {
        return view('goodbye');
    }
}
