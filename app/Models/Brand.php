<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";
    protected $primaryKey = "brand_id";

    protected $fillable = [
        "name",
        "slug"
    ];

    public function products()
   {
      return $this->hasMany(Brand::class, "brand_id");
   }
    public $timestamps = false;

}
