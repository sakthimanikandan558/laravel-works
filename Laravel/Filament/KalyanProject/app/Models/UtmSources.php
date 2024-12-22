<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtmSources extends Model
{
    use HasFactory;
    protected $fillable = ['utm_source', 'utm_medium', 'utm_campaign', 'comments', 'blocked_status', 'blocked_by', 'manage_agency_id'];

    protected static function booted()
    {
        static::creating(function ($utmSource) {
            $utmSource->comments = '';
            $utmSource->blocked_status = false;
            $utmSource->blocked_by = null;
        });
    }
    public function manageAgency()
    {
        return $this->belongsTo(ManageAgency::class);
    }
}
