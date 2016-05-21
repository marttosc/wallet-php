<?php

namespace Wallet\Http\Controllers\Front;

use Wallet\Http\Requests;
use Illuminate\Http\Request;
use Wallet\Http\Controllers\FrontController as Front;

class HomeController extends Front
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
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site::welcome');
    }
}