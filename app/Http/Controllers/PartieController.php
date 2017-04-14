<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partie;
use App\File;
use \Symfony\Component\HttpFoundation\Response;
class PartieController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'full_name',
            'partie_file_id',
        ]);
        $file = new File();
        $data = $request->all();
        $partie = new Partie();
        $partie->full_name = $data['full_name'];
        $partie->part_phone = $data['part_phone'];
        //$partie->save();
        $file->parties()->save($partie, ['type' => TRUE, 'nature' => TRUE, 'file_id' => $data['partie_file_id']]);
        //$file->parties()->save($partie);
        return response()->json();
    }

    /* get parties by file_id */

    public function all($file_id) {
        $res = File::find($file_id)->parties;
        return response()->json(['parties' => $res]);
    }
    
    public function getPartieInfo($id) {
        $partie = File::find('4')->parties()->where('partie_id',$id)->first();
        if(empty($partie)){
            return response()->json(['message' => 'not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['partie' => $partie]);
    }

}
