<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emptab1 extends Model
{
    protected $table='emptab1';
    use HasFactory;

    public function details(){
        return $this->hasOne(Employee_details::class,'employee_id','id');
    }

    public function detailsMany(){
        return $this->hasMany(Employee_details::class,'employee_id','id');
    }
}
