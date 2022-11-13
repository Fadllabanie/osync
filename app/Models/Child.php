<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'nike_name', 'home_phone', 'mobile', 'birthday',
        'avatar', 'code', 'gender', 'blood_type', 'home_address','school_address',
        'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
