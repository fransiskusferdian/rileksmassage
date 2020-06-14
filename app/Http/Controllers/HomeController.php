<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Banner;
use App\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
}
