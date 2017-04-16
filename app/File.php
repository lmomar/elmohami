<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'id', 'reference', 'type','division', 'subject', 'elementary_num',  'decision_judge', 'registration_date', 
        'verdict', 'veerdict_date', 'appellate_num','appellate_judge','office_id', 'court_id',
    ];
    
    public function sittings()
    {
        return $this->hasMany('App\Sitting');
    }
    
    public function procedures() {
        return $this->hasMany('App\Procedure');
    }
    
    public function parties() {
       /*return $this->belongsToMany('App\Partie', 'file_partie')->using('App\FilePartie')
                ->withPivot('type','nature');*/
        return $this->belongsToMany(Partie::class,'file_partie','file_id','partie_id')->withPivot('type','nature');
                
    }
    
}
