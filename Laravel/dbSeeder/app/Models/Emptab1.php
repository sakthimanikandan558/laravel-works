<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emptab1 extends Model
{
    use HasFactory;
    protected $table='emptab1';
    protected $fillable=['name','position','dept','salary','created_at','updated_at'];

}
