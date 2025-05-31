<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "locations";
    protected $primaryKey = "location_id";

     protected $fillable = [
        "name",
        "slug"
     ];

     public $timestamps = false;

     public function products()
   {
      return $this->hasMany(Location::class, "location_id");
   }
}
