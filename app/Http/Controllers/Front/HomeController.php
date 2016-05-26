<?php

namespace Wallet\Http\Controllers\Front;

use Wallet\Http\Requests;
use Illuminate\Http\Request;
use Wallet\Http\Controllers\FrontController as Front;

class HomeController extends Front
{
    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site::home');
    }
}