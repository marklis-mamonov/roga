<?php

namespace App\Models\Interfaces;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasTags {

    public function tags(): MorphToMany;

}