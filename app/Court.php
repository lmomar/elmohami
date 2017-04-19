<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'id', 'name', 'parent_id',
    ];


    public function files(){
        return $this->hasMany(File::class);
    }
}
