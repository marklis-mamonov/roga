<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function about_us()
    {
        return view('pages.about_us');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function conditions()
    {
        return view('pages.conditions');
    }

    public function finance_department()
    {
        return view('pages.finance_department');
    }

    public function for_clients()
    {
        return view('pages.for_clients');
    }
}
