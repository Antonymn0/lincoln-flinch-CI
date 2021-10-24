<?php

namespace App\Controllers\Web\Dashboard;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/dashboard');
    }
}
