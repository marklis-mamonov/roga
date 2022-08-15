<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\Contracts\CategoriesRepositoryContract;

class CarController extends Controller
{

    private $carsRepository;
    private $categoriesRepository;

    public function __construct(CarsRepositoryContract $carsRepository, CategoriesRepositoryContract $categoriesRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->categoriesRepository = $categoriesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $perPage = 16;
        $page = $_GET['page'] ?? 1;
        $childrenCategories = $this->categoriesRepository->getChildrenCategories($category->id);
        $cars = $this->carsRepository->getAllFromCategoryWithPaginate($category, $childrenCategories, $perPage, $page);
        return view('pages.cars.index', compact('cars', 'category'));
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
