<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

Interface ImageServiceContract
{
    public function uploadImage($file);
}