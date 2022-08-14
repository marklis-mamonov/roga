<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Image;

Interface ImagesRepositoryContract
{
    public function create($path): Image;
}