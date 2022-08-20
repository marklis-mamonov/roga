<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Services\Contracts\CarServiceContract;
use App\Repositories\Contracts\CarsRepositoryContract;
use Illuminate\Validation\ValidationException;

class CarController extends Controller
{

    protected $carsRepository;
    protected $carService;

    public function __construct(CarsRepositoryContract $carsRepository, CarServiceContract $carService)
    {
        $this->carsRepository = $carsRepository;
        $this->carService = $carService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->carsRepository->getAll();
        return CarResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $validated = $request->validated();
        $uploadCollection = $request->collect();
        $car = $this->carService->apiCreate($uploadCollection);
        return response()
            ->json(['success' => true, 'car_id' => $car->id], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, $id)
    {
        $validated = $request->validated();
        $uploadCollection = $request->collect();
        $this->carService->apiUpdate($uploadCollection, $id);
        return response()
            ->json(['success' => true, 'car_id' => $id], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->carsRepository->apiDelete($id);
        return response()
            ->json(['success' => true, 'car_id' => $id], 200);
    }
}
