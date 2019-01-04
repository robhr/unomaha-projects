<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Purchase;

class MetricsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.metrics');
    }

    /**
     * Return purchase data
     *
     * @return \Illuminate\Http\Response
     */
    public function purchases()
    {
        return Purchase::all()->pluck('created_at');
    }
}
