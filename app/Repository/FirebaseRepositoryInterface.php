<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;

/**
* Interface FirebaseRepositoryInterface
* @package App\Repositories
*/
interface FirebaseRepositoryInterface
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}