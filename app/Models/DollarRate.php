<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DollarRate extends Model
{   
    protected $table = "dollar_rate";

    protected $primaryKey = "dollar_rate_id";

    protected $fillable = [
        "in_bs",
        "last_update"
    ];

    public $timestamps = true;
}
