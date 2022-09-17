<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
    use HasFactory;
    protected $fillable = [
        'details','amount','month','spend_date','year'
    ];
}
