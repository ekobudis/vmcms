<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];

    public function sectionWebmaster()
    {
        return $this->belongsTo('\App\Models\WebmasterSection','webmaster_section_id','id');
    }
}
