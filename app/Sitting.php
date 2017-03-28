<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    protected $primaryKey = 'sitting_id';
    
    public function file() {
        return $this->belongsTo('App\File','file_reference');
    }
}
