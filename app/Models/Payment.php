<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class)->withDefault();
    }
    public function pool(){
        return $this->belongsTo(Pool::class)->withDefault();
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function userDetails(){
        return $this->hasOne(userDetails::class)->withDefault();
    }
    public function order(){
        return $this->belongsTo(Order::class)->withDefault();
    }
}
