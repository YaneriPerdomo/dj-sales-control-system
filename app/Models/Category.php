<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = "categorys";
   protected $primaryKey = "category_id";

   protected $fillable = [
      "name",
      "slug",
      "category_id"
   ];

   public $timestamps = false;

   public function products()
   {
      return $this->hasMany(Category::class, "category_id");
   }
}
