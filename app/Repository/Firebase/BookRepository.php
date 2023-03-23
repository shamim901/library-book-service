<?php

namespace App\Repository\Firebase;

use App\Models\Book;
use App\Repository\BookRepositoryInterface;
use Illuminate\Support\Collection;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
    * UserRepository constructor.
    *
    * @param Book $model
    */
   public function __construct(Book $model)
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