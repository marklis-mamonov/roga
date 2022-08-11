<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Repositories\Contracts\CarsRepositoryContract;

class CarController extends Controller
{

    private $carsRepository;

    public function __construct(CarsRepositoryContract $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->carsRepository->getAllWithPaginate();
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
