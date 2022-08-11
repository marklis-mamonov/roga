<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;
use App\Models\Interfaces\HasTags;

Interface TagsSynchroniserContract
{
    public function sync(Collection $tags, HasTags $model);
}