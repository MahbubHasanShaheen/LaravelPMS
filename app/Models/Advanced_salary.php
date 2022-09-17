<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advanced_salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id','month','year','advanced_salary'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
