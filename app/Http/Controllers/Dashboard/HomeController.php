<?php

namespace Wallet\Http\Controllers\Dashboard;

use Wallet\Http\Requests;
use Illuminate\Http\Request;
use Wallet\Http\Controllers\DashboardController as Dashboard;

class HomeController extends Dashboard
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard::home');
    }
}