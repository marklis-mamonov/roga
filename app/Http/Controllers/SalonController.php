<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\SalonsRepositoryContract;

class SalonController extends Controller
{
    protected $salonsRepositoryContract;

    public function __construct(SalonsRepositoryContract $salonsRepositoryContract)
    {
        $this->salonsRepositoryContract = $salonsRepositoryContract;
    }

    public function index()
    {
        $salons = $this->salonsRepositoryContract->getSalons();
        return view('pages.salons.index', compact('salons'));
    }
}
