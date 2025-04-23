<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPorto extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'title', 'description', 'institution'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
