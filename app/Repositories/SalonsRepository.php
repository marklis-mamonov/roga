<?php

namespace App\Repositories;

use App\Repositories\Contracts\SalonsRepositoryContract;
use App\Services\Contracts\SalonsClientServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class SalonsRepository implements SalonsRepositoryContract
{
    protected $salonsClientService;

    public function __construct(SalonsClientServiceContract $salonsClientService)
    {
        $this->salonsClientService = $salonsClientService;
    }
 
    public function getSalons()
    {
        $salonsClientService = $this->salonsClientService;
        return $cars = Cache::tags(['salons'])->remember('salons|all', 3600, function () use ($salonsClientService) {
            return collect($salonsClientService->getSalons());
        });
    }

    public function getRandomSalons($count)
    {
        $salonsClientService = $this->salonsClientService;
        return $cars = Cache::tags(['salons'])->remember('salons|random|' . $count, 600, function () use ($count, $salonsClientService) {
            return collect($salonsClientService->getRandomSalons($count));
        });
    }
    
}
