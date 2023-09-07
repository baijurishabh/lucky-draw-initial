<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Questocat\Referral\Traits\UserReferral;
use Illuminate\Contracts\Auth\CanResetPassword ;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, UserReferral ,SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetails(){
        return $this->hasOne(UserDetails::class)->withDefault();
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function enquiry(){
        return $this->hasMany(Enquiry::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    // public function referred($value){
    //     if($value){
    //         $user=User::where('affiliate_id',$value)->first();
    //         if($user){
    //             return $user->name;
    //         }
    //         return 'User Not Found';
    //     }
    //     return 'No One';
    // }
    public function referredBy(){
        return $this->belongsTo(User::class,'referred_by','affiliate_id')->withDefault(['name'=>'No One']);
    }
    public function affiliate(){
        return $this->hasMany(User::class, 'referred_by','affiliate_id');
    }
    public function winner(){
        return $this->hasMany(Winner::class);
    }
}
