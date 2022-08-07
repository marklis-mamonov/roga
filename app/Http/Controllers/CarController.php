<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::get();
        return view('pages.cars.index', compact('cars'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('pages.cars.show', compact('car'));
    }
}
