<?php

namespace App\Repository\Firebase;

use App\Models\Author;
use App\Repository\AuthorRepositoryInterface;
use Illuminate\Support\Collection;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    /**
    * UserRepository constructor.
    *
    * @param Author $model
    */
   public function __construct(Author $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();
   }
}