<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'publish',
        'url',
        'created_by',
        'updated_by',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            $video->created_by = Auth::id();
            $video->updated_by = Auth::id();
        });

        static::updating(function ($video) {
            $video->updated_by = Auth::id();
        });
    }
}
