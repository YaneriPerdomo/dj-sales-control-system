<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditRate extends Model
{
    protected $table = "credit_rate";
    protected $primaryKey = "credit_rate_id";

    protected $fillable = [
        "value",
        "updated_at",
    ];

    public $timestamps = true;
}
