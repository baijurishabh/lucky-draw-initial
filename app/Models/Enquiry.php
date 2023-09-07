<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory,SoftDeletes;
    public function product(){
        return $this->belongsTo(Product::class)->withDefault();
    }
    public function pool(){
        return $this->belongsTo(Pool::class)->withDefault();
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
}
