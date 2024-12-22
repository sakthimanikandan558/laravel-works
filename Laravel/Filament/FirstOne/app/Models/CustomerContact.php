<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CustomerContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'contact_type', 'name', 'email', 'phone', 'is_active', 'created_by', 'updated_by'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

