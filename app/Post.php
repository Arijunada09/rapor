<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;



class Post extends Model
{
    use Sluggable;

    // instansi dari karbon
    protected $fillable = ['title', 'content', 'slug', 'thumbnail', 'user_id'];
    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
