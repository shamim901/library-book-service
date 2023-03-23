<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface AuthorRepositoryInterface
* @package App\Repositories
*/
interface AuthorRepositoryInterface
{

   public function all(): Collection;
}