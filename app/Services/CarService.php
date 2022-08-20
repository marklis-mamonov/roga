<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Contracts\CarServiceContract;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Models\Car;

class CarService implements CarServiceContract
{

    protected $carsRepository;

    public function __construct(CarsRepositoryContract $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function apiCreate(Collection $uploadCollection)
    {
        $data = [
            'name' => $uploadCollection->get('name'),
            'body' => $uploadCollection->get('body'),
            'price' => $uploadCollection->get('price'),
            'old_price' => $uploadCollection->get('old_price'),
            'car_body_id' => $uploadCollection->get('car_body_id'),
            'is_new' => 0,
        ];

        return $this->carsRepository->apiCreate($data);
    }

    public function apiUpdate(Collection $uploadCollection, $id)
    {
        $data = [
            'name' => $uploadCollection->get('name'),
            'body' => $uploadCollection->get('body'),
            'price' => $uploadCollection->get('price'),
            'old_price' => $uploadCollection->get('old_price'),
            'car_body_id' => $uploadCollection->get('car_body_id'),
        ];
        
        return $this->carsRepository->apiUpdate($id, $data);
    }
}