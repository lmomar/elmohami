<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    
    public function file() {
        return $this->belongsTo('App\File','file_id');
    }
    
    public function procedure(){
        return $this->hasMany('App\Procedure');
    }
        
    
}
