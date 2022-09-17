<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id','att_date','att_year','attendence','month','edit_date'
    ];
    public function employee(){
        return $this->belongsTo(Employee::class,'emp_id');
    }
}
