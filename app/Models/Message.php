<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    const PENDING = 0;
    const READ = 1;

    protected $fillable = [
        'name', 'email', 'phone', 'code', 'title', 'message',
        'read_at', 'status'
    ];

    public function scopePending($query)
    {
        return $query->where('status', self::PENDING);
    }
}
