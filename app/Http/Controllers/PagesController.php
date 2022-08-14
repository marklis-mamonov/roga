<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Car;
use Illuminate\Support\Str;
use App\Repositories\Contracts\ArticlesRepositoryContract;
use App\Repositories\Contracts\CarsRepositoryContract;
use App\Repositories\Contracts\BannersRepositoryContract;

class PagesController extends Controller
{

    protected $articlesRepository;
    protected $carsRepository;
    protected $bannersRepository;

    public function __construct(ArticlesRepositoryContract $articlesRepository, CarsRepositoryContract $carsRepository, BannersRepositoryContract $bannersRepository)
    {
        $this->articlesRepository = $articlesRepository;
        $this->carsRepository = $carsRepository;
        $this->bannersRepository = $bannersRepository;
    }

    public function homepage()
    {
        $articles = $this->articlesRepository->getNewArticles();
        $weekCars = $this->carsRepository->getWeekCars();
        $banners = $this->bannersRepository->getThreeRandomBanners();
        return view('pages.homepage', compact('articles', 'weekCars', 'banners'));
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
        $cars = $this->carsRepository->getCarsWithRelations();
        $carPriceAvg = $cars->pluck('price')->avg();
        $carPriceDiscountAvg = $cars->whereNotNull('old_price')->pluck('price')->avg();
        $carMaxPriceValue = $cars->max('price');
        $carMaxPrice = $cars->where('price', $carMaxPriceValue);
        $carSalons = $cars->whereNotNull('salon')->pluck('salon')->unique();
        $carEngines = $cars->whereNotNull('CarEngine')->pluck('CarEngine')->unique()->sortBy('name')->pluck('name');
        $carClasses = $cars->whereNotNull('carClass')->pluck('carClass')->unique()->sortBy('name')->pluck('name');
        $carClassesSlug = $carClasses->map(function ($item) {
            return Str::slug($item);
        });
        $carClasses = $carClassesSlug->combine($carClasses);
        $carWith5or6 = $cars->whereNotNull('old_price')->filter(function($value, $key) {
            $pos1 = strpos($value->kpp, 5);
            $pos2 = strpos($value->kpp, 6);
            $pos3 = strpos($value->CarEngine->name, 5);
            $pos4 = strpos($value->CarEngine->name, 6);
            $pos5 = strpos($value->name, 5);
            $pos6 = strpos($value->name, 6);
            return (($pos1) or ($pos2) or ($pos3) or ($pos4) or ($pos5) or ($pos6));
        });
        $carBodies = $cars->whereNotNull('CarBody')->pluck('CarBody')->unique()->values();
        $carBodyPriceAvg = collect([]);
        foreach ($carBodies as $carBody) {
            $item = $cars->where('CarBody', $carBody)->pluck('price')->avg();
            $carBodyPriceAvg->push($item);
        }
        $carBodyNames = $carBodies->pluck('name');
        $carBodyPriceAvg = $carBodyNames->combine($carBodyPriceAvg)->sort();
        return view('pages.for_clients', compact('carPriceAvg', 'carPriceDiscountAvg', 'carMaxPrice', 'carSalons', 'carEngines', 'carClasses', 'carWith5or6', 'carBodyPriceAvg'));
    }
}
