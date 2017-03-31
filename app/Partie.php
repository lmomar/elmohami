<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    //
    
    
        public function files() {
        return $this->belongsToMany('App\File', 'file_partie')->using('App\FilePartie');
    }
}
