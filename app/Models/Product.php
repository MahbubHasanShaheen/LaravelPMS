<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     
    protected $fillable = [
        'product_name','cat_id','sup_id','brand',
        'product_code','waranty','product_qty',
        'product_garage','product_route','product_image',
        'purchase_date','expire_date','purchase_price','selling_price','status'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class,'sup_id');
    }
}


