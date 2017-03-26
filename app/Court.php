<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'court_id', 'court_name', 'court_parent',
    ];


    public function files(){
        return $this->hasMany('App\File');
    }
}
