<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use Sluggable;

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'banner_slug' => [
                'source' => 'banner_subtitle'
            ]
        ];
    }
}
