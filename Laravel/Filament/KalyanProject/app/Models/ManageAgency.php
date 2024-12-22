<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAgency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id',
        'create_at',
        'update_at'
    ];

    public function utmSources()
    {
        return $this->hasMany(UtmSources::class);
    }

}
