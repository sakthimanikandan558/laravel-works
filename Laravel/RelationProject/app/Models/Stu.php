<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\Stu_Course;

class Stu extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsToMany(Course::class,Stu_Course::class );
    }
}
