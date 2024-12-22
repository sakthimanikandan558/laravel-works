<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'roll_no', 'tamil', 'english', 'maths'];

    // Calculate total marks and percentage
    public function getTotalMarksAttribute()
    {
        return $this->tamil + $this->english + $this->maths;
    }

    public function getPercentageAttribute()
    {
        $totalMarks = $this->total_marks;
        $maxMarks = 300; // Assuming each subject is out of 100
        return ($totalMarks / $maxMarks) * 100;
    }

    //Student relation
    public function student()
    {
        //current clicked student
        return $this->belongsTo(User::class, 'user_id');
        }
}
