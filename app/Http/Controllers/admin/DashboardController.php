<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\order;
use App\Models\admin\agencies;
class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalAgencies = agencies::all()->count();
        $totalOrders = order::all()->count();
        return view('admin.dashboard',['totalOrders' => $totalOrders ,'totalAgencies' => $totalAgencies]);
    }
}
