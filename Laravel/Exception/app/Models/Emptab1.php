<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emptab1 extends Model
{
    protected $table = 'emptab1';
    
    protected $fillable = ['name', 'dept', 'position', 'salary'];
}

