<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'position'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
