<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
       'supplier_id', 'name','email','phone','address','type','account_number','account_name','bank_name','branch_name','city','photo'
    ];
}
