<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public $timestamps = false;
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($post) {
    //         $post->slug = $post->generateSlug($post->company_name);
    //         $post->save();
    //     });
    // }
    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'company_name'
    //         ]
    //     ];
    // }
}
