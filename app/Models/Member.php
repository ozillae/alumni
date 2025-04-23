<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'address', 'phone', 'email', 'title_front', 'title_back',
        'file_profil', 'province', 'city', 'division', 'status', 'joint_date',
        'deleted_by', 'created_by', 'updated_by', 'description'
    ];

    public function portfolios()
    {
        return $this->hasMany(MemberPorto::class);
    }
}
