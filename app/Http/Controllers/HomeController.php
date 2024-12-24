<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = 'Selamat Datang di Nguengg!';
        return view('home', compact('pageTitle'));
    }
}
