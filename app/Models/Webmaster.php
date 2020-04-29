<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webmaster extends Model
{
    protected $guarded = [];

    public function workHour()
    {
        return $this->hasOne('\App\Models\WebmasterHour','webmaster_id','id');
    }
}
