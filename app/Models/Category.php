<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'icon'
    ];
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    public function corporateCards()
    {
        return $this->hasMany(Card::class)->where('user_id', Auth::user()->id);
    }
    public function managerCards()
    {
        return $this->hasMany(Card::class)->where('user_id', Auth::user()->user_id);
    }
}
