<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePortFolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id', 'url', 'name', 'status'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
