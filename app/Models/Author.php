<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table ="mst_author";

    protected $fillable = [
		'name','name_bn','phone'
	];

    public function books()
    {
      return $this->hasMany(Book::class);
    }
}
