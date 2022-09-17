<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name','email','phone','address','city','shopname','banck_account','account_name','bank_name','branch_name','photo'
    ];
}
