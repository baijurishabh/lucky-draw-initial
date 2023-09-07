<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    public function product(){
        return $this->belongsTo(Product::class)->withTrashed()->withDefault();
    }
    public function pool(){
        return $this->belongsTo(Pool::class)->withTrashed()->withDefault();
    }
    public function payment(){
        return $this->belongsTo(Payment::class)->withDefault();
    }
    public function user(){
        return $this->belongsTo(User::class)->withTrashed()->withDefault();
    }
}
