<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface BookRepositoryInterface
* @package App\Repositories
*/
interface BookRepositoryInterface
{

   public function all(): Collection;

   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param array $attributes
    * @return Model
    */
   public function update(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}