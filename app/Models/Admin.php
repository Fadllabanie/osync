<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasFactory, HasRoles;

    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'password', 'no_of_employees', 'role', 'logo', 'is_active', 'admin_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
