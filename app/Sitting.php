<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    protected $table='sittings';

    protected $fillable =['sitting_date', 'nature', 'hall', 'file_id', 'created_at', 'updated_at'];

    public function file() {
        return $this->belongsTo('App\File','file_id');
    }
    
    public function procedure(){
        return $this->hasMany('App\Procedure');
    }
        
    
}
