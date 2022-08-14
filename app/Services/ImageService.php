<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Repositories\Contracts\ImagesRepositoryContract;
use App\Services\Contracts\ImageServiceContract;
use Illuminate\Support\Facades\Storage;

class ImageService implements ImageServiceContract
{

    protected $imagesRepository;

    public function __construct(ImagesRepositoryContract $imagesRepository)
    {
        $this->imagesRepository = $imagesRepository;
    }

    public function uploadImage($file)
    {
        if ($file) {
            $path = $file->store('images', ['disk' => 'public']);
            $image = $this->imagesRepository->create($path);
            $imageId = $image->id;
        } else {
            $imageId = null;
        }

        return $imageId;
    }
}
