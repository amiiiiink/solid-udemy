<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

abstract class Repository
{

    /**
     * @return Collection
     */
    abstract public function all() : Collection;
}
