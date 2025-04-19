<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'publish',
        'file_path',
        'created_by',
        'updated_by',
        'description',
    ];
}
