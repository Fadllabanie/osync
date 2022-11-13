<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'nike_name', 'home_phone', 'owner_mobile', 'birthday',
        'avatar', 'code', 'gender',
        'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
