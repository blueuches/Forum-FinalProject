<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable   = [
        'user_id',
        'community_id',
        'title',
        'slug',
        'description',
        'url'
    ];

    public function sluggable(): array{
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
