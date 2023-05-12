<?php

namespace App\Http\Controllers;
use Setting;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    public function logs()
    {
        return view('pages.logs');
    }

    public function settings()
    {
        $settings = Setting::all();
        return view('pages.settings');
    }

    public function links()
    {
        return view('pages.links');
    }
}
