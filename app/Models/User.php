<?php

namespace App\Models;

use App\Http\Traits\HasUuid;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasUuid;

    protected $guarded = 'api';

    const AVATAR = 1;
    const COVER = 2;
   
    protected $fillable = [
        'full_name',
        'code',
        'mobile',
        'email',
        'avatar',
        'cover',
        'verified_at',
        'country_id',
        'city_id',
        'password',
        'device_token',
        'remember_token',
        'google_token',
        'facebook_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function children()
    {
        return $this->hasMany(Child::class);
    }
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
    public function defaultProfile()
    {
        return $this->hasMany(Profile::class)->where('is_default', true);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function userToken()
    {
        return $this->hasOne(UserToken::class, 'user_id', 'provider_id');
    }

    public function followings()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'follower_id')
            ->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'following_id')
            ->withTimestamps();
    }
    public function lastFollowers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'following_id')
            ->take(1)
            ->orderByPivot('created_at', 'desc')
            ->withTimestamps();
    }
}
