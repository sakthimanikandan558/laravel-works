<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table='userpage';
    protected $fillable=['name','email','mobileno','created_at','updated_at'];

}
