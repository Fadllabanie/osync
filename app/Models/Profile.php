<?php

namespace App\Models;

use App\Http\Traits\HasUuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory,HasUuid;

    const HIDING = 0;
    const VISIBLE = 1;
   
    // protected $fillable = [
    //     'work_mobile', 'work_email', 'role','display_links','display_fields',
    //     'organization_address', 'organization_url', 'organization','industrie_id',
    //     'avatar', 'email', 'gender','cover','is_default',
    //     'birthday', 'mobile', 'home_phone','prefix',
    //     'nike_name', 'last_name', 'middle_name','from_cooperate',
    //     'first_name', 'code', 'user_id','status','admin_id'
    // ];

    protected $guarded =[];
    
    protected $casts = [
        'display_fields' => 'array'
    ];
    
    public function scopeMine($query)
    {
        return $query->where('user_id', Auth::id());
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function card()
    {
        return $this->belongsTo(Card::class);
    }  
    public function industrie()
    {
        return $this->belongsTo(Industry::class);
    }
    public function links()
    {
        return $this->hasMany(ProfileLink::class);
    }
     public function portfolios()
    {
        return $this->hasMany(ProfilePortFolio::class);
    }
    public function cards()
    {
        return $this->belongsToMany(Profile::class, 'card_profile','profile_id','card_id')->withPivot('user_id')->withTimestamps();
    }
}
