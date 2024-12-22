<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emptab extends Model
{
    use HasFactory;
    protected $table = 'emptab'; // Specify the table name
    protected $fillable = ['name', 'email', 'salary'];
}
