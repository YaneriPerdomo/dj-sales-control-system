<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $fillable = [
        "gender_id",
        "supplier_id",
        "name",
        "telephone_number",
        "address",
        'slug'
    ];

    protected $primaryKey = "supplier_id";

    public $timestamps = true;

    public function gender()
    {
        return $this->belongsTo(Gender::class, "gender_id");
    }

    public function products(){
        return $this->hasMany(Supplier::class,"supplier_id");
    }
   
}
