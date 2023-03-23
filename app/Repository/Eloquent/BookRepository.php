<?php

namespace App\Repository\Eloquent;

use App\Models\Book;
use App\Repository\BookRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    /**
    * BookRepository constructor.
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

    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }


    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function update(array $attributes): Model
    {
        $flight = Flight::find(1);

        $flight->name = 'Paris to London';

        $flight->save();

        return $this->model->save();
    }


    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
}
