<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'token', 'code','client_id', 'name', 'category_id', 'subcategory_id',
        'admin_id', 'manger_id', 'origin_id', 'status', 'note'
    ];

    public function scopeMine($query)
    {
        return $query->where('client_id', Auth::id());
    }

    public function corporate()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }
    public function manager()
    {
        return $this->belongsTo(Admin::class, 'manager_id');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'card_profile', 'card_id', 'profile_id')->withPivot('user_id')->withTimestamps();
    }
}
