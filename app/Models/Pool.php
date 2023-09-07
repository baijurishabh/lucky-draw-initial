<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pool extends Model
{
    use HasFactory,SoftDeletes;
    public function poolProduct(){
        return $this->hasMany(PoolProduct::class);
    }
}
