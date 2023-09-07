<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoolProduct extends Model
{
    use HasFactory, SoftDeletes;
    public function product(){
        return $this->belongsTo(Product::class)->withTrashed()->withDefault();
    }
    public function pool(){
        return $this->belongsTo(Pool::class)->withTrashed()->withDefault();
    }
    public function user(){
        return $this->belongsTo(User::class)->withTrashed()->withDefault();
    }
    public function enquiry(){
        return $this->hasMany(Enquiry::class,'pool_products_id')->withTrashed();
    }
    public function winner(){
        return $this->hasMany(Winner::class)->withTrashed();
    }
    public function grandWinner(){
        return $this->hasMany(Winner::class)->withTrashed();
    }

}
