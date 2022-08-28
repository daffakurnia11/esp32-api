<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function panel_monitoring()
    {
        return view('monitoring.panel');
    }
}
