<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    public function index()
     {
        return view('pages.Home');
     }

     public function course()
     {
        return view('pages.Course');
     }

     public function statistics()
     {
        return view('pages.Statistic');
     }

     public function feature()
     {
        return view('pages.Feature');
     }

     public function systemSpk()
     {
        return view('pages.System-spk');
     }

     public function contact()
     {
        return view('pages.Contact');
     }
}

