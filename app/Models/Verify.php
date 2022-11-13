<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;
    
   protected $fillable = [
    'user_id','system','type','verification_code','verification_expiry_minutes'
];
}
