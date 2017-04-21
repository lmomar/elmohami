<?php

namespace App\Http\Controllers;

use App\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class FileController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }
    
    public function manageVue() {
        $courts = Court::all()->where('parent_id', 'is', null);
        return view('Files.index', compact('courts'));
    }

    public function index(Request $request) {
        $courts = Court::all()->where('parent_id', 'is', null);
        $count = File::all()->count();
        $files = DB::table('files')
                ->join('courts','files.court_id','=','courts.id')
                ->select('files.*','courts.name')
                ->paginate(6);
        //dd($files2);
        $response = [
            'pagination' => [
                'total' => $files->total(),
                'per_page' => $files->perPage(),
                'current_page' => $files->currentPage(),
                'last_page' => $files->lastPage(),
                'from' => $files->firstItem(),
                'to' => $files->lastItem()
            ],
            'data' => $files
        ];
        return response()->json($response);
        //dd($courts);
        //return view('files.index', compact('courts'))->with(['files' => $files, 'count' => $count]);
    }

    public function store(Request $request) {
        //$file = new File();
        $this->validate($request, [
            'reference'
        ]);
        $create = File::create($request->all());
        
        /* $inputs = $request->all();
        $file->reference = $inputs['reference'];
        
        $file->court_id = $inputs['sub_courts'];
        $file->office_id = '1'; 

        $file->registration_date = $inputs['registration_date'];
        $file->type = $inputs['type'];
        $file->division = $inputs['division'];
        $file->subject = $inputs['subject'];
        $file->elementary_num = $inputs['elementary_num'];
        $file->decision_judge = $inputs['decision_judge'];
        //dd($file);
        $file->save();*/
        return response()->json($create);
    }

    public function liste() {
        $files = File::paginate(5);
        $count = File::all()->count();

        return response()->json(['files' => $files, 'count' => $count]);
    }

    public function getFileInfo($id) {
        $file = File::findOrFail($id);
        if (empty($file)) {
            return response()->json(['message' => 'not found'], 404);
        }
        return response()->json(['file' => $file]);
    }

  

    public function update(Request $request,$id) {
        $this->validate($request, [
            'reference',
            'sub_courts'
        ]);
      
        $update = File::find($id)->update($request->all());
        return response()->json($update);
    }

    public function delete($id) {
        //
    }

}
