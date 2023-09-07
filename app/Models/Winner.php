<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Winner extends Model
{

    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class)->withTrashed()->withDefault();
    }
    public function pool(){
        return $this->belongsTo(Pool::class)->withTrashed()->withDefault();
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function scopeCountdown($query)
    {
        return $query->where('countdown', '>', Carbon::now())->delete();
    }
    public function winner(){
        return $this->hasMany(Winner::class);
    }
    public function poolProduct(){
        return $this->belongsTo(PoolProduct::class)->withTrashed()->withDefault();
    }
}


