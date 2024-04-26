<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FreekassaController extends Controller
{
    public function notification()
    {
        return view('freekassa.notification');
    }
    public function success()
    {
        return view('freekassa.success');
    }
    public function failure()
    {
        return view('freekassa.failure');
    }
}
