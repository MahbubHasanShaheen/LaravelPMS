<?php

namespace App\Models;


;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

        protected $fillable = [
        'company_name','logo','email','phone','address','city','country','zipcode'
    ];

}
