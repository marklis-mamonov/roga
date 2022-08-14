<?php

namespace App\Repositories;

use App\Repositories\Contracts\ImagesRepositoryContract;
use Illuminate\Support\Collection;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    private $model;

    public function __construct(Image $model)
    {
        $this->model = $model;
    }

    public function create($path): Image
    {
        return $this->model::create(['path' => $path]);
    }
    
}
