<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table ="mst_books";

    protected $fillable = [
		  'name','name_bn','author_id'
	  ];

  public function author()
  {
    return $this->belongsTo(Author::class);
  }

  // prefix column value
  // public function getAuthorIdAttribute($value)
  // {
  //     return "author_id_" . $value;
  // }

}
