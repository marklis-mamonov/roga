<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Car;

class PagesController extends Controller
{
    public function homepage()
    {
        $articles = Article::latest('published_at')->whereNotNull('published_at')->limit(3)->get();
        $newCars = Car::get()->where('is_new', 1);
        $newCarsArray = $newCars->all();
        if (count($newCarsArray) > 4)
        {
            $weekCarsKeys = array_rand($newCarsArray, 4);
            for ($i = 0; $i < 4; $i++) {
                $weekCarsArray[] = $newCarsArray[$weekCarsKeys[$i]];
            }
            $weekCars = collect($weekCarsArray);
        } else {
            $weekCars = $newCars;
        }
        return view('pages.homepage', compact('articles', 'weekCars'));
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
