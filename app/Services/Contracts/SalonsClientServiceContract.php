<?php

namespace App\Services\Contracts;

Interface SalonsClientServiceContract
{
    public function getSalons();

    public function getRandomSalons($count);
}