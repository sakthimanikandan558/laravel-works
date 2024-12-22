<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Stu;
use App\Models\Stu_Course;

class Course extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Stu::class,Stu_Course::class);
    }
}
