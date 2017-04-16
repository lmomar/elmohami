<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    //protected $table = 'Parties';




    public function files() {
        return $this->belongsToMany(File::class,'file_partie','partie_id','file_id')->withPivot('type','nature');;
    }
}
