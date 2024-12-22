<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id', // Make sure user_id is fillable for mass assignment
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
