<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee_details extends Model
{
    protected $table='employee_details';
    use HasFactory;

    public function empDetails():BelongsTo
    {
        return $this->belongsTo(Emptab1::class,'employee_id','id');
    }
}
