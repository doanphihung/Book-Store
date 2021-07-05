<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $this->isPermission('can-view-DashBoard');
        return view('backend.dashboard');
    }
}
