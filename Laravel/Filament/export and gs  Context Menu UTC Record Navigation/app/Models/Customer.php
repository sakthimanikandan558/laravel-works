<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Customer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'code',
        'legal_name',
        'status',
        'source',
        'created_by',
        'updated_by',
        'avatar'
    ];
    public function contacts()
    {
        return $this->hasMany(CustomerContact::class);
    }
}
