<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    public function poolProduct(){
        return $this->hasMany(PoolProduct::class)->withTrashed();
    }
    public function order(){
        return $this->hasMany(Order::class)->withTrashed();
    }
    public function category(){
        return $this->belongsTo(Category::class)->withTrashed()->withDefault();
    }
    public function setSlugAttribute($value) {

        if (static::whereSlug($slug = Str::slug($value))->exists()) {

            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }
    public function incrementSlug($slug) {

        $original = $slug;

        $count = 2;

        while (static::whereSlug($slug)->exists()) {

            $slug = "{$original}-" . $count++;
        }

        return $slug;

    }


}
