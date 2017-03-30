<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    public function sitting()
    {
        return $this->belongsTo('App\Sitting');
    }
}
