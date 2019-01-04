<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class ActivityController extends Controller
{   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.activity');
    }

    /** 
     * Return all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return Log::orderBy('created_at', 'desc')->get();
    }
}
