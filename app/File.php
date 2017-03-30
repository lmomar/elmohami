<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_reference', 'elementary_num',  'decision_judge','appellate_num','appellate_judge','office_id', 'court_id',
    ];
    
    public function sitting()
    {
        return $this->hasMany('App\Sitting');
    }
    
}
