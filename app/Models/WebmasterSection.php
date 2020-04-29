<?php

namespace App\Models;

use Harimayco\Menu\Models\MenuItems;
use Illuminate\Database\Eloquent\Model;

class WebmasterSection extends Model
{
    protected $guarded = [];

    public function menuItem()
    {
        return $this->belongsTo('\Harimayco\Menu\Models\MenuItems','menu_item_id','id');
    }

    public function kategori()
    {
        return $this->hasMany(Section::class);
    }
}
