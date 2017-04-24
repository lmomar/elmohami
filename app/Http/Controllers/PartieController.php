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

    public function all(Request $request,$file_id) {
        //$file_id = $request->get('file_id');
        $res = File::find($file_id)->parties()->paginate(2);

        $response = [
            'Parties_pagination' => [
                'total' => $res->total(),
                'per_page' => $res->perPage(),
                'current_page' => $res->currentPage(),
                'last_page' => $res->lastPage(),
                'from' => $res->firstItem(),
                'to' => $res->lastItem()
            ],
            'data' => $res
        ];
        return response()->json($response);
    }
    
    public function getPartieInfo($id) {
        $partie = Partie::where('partie_id',$id)->first();
        if(empty($partie)){
            return response()->json(['message' => 'not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['partie' => $partie]);
    }
    
    
    public function update(Request $request) {
        $this->validate($request, [
            'full_name',
            'e_partie_file_id',/* en cas ou l'input file_id est vide(erreur js ?!! )*/
            'partie_id',/* from input */
        ]);
        $data = $request->all();
        $partie = Partie::find($data['partie_id']);
        $partie->full_name = $data['full_name'];
        $partie->part_phone = $data['part_phone'];
        
        
        $partie->save();
        return response()->json();
    }

}
