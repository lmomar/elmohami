<?php

namespace App\Http\Controllers;

use App\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
class FileController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    
    public function index()
    {
        $files = File::paginate(2);
        $courts = Court::all()->where('parent_id','is',null);
        $count = File::all()->count();
        //dd($courts);
        return view('files.index',compact('courts'))->with(['files' => $files,'count' => $count]);
    }



   
    public function store(Request $request)
    {
        $file = new File();
        $this->validate($request, [
            'reference'
        ]);
        $inputs = $request->all();
        $file->reference = $inputs['reference'];
        /* relations */
        $file->court_id = $inputs['sub_courts'];
        $file->office_id = '1'; /* get office id from connected user */
        
        $file->registration_date = $inputs['registration_date'];
        $file->type = $inputs['type'];
        $file->division = $inputs['division'];
        $file->subject = $inputs['subject'];
        $file->elementary_num =$inputs['elementary_num'];
        $file->decision_judge =$inputs['decision_judge'];
        //dd($file);
        $file->save();
        return response()->json();
    }

    
    public function liste()
    {
        $files = File::paginate(2);
        $count = File::all()->count();
        
        return response()->json(['files' => $files,'count' => $count]);
    }

    public function getFileInfo($id){
        $file = File::findOrFail($id);
        if(empty($file))
        {
            return response()->json(['message' => 'not found'],404);
        }
        return response()->json(['file' => $file]);
        
    }


    public function edit($id)
    {
        
    }

   
    public function update(Request $request)
    {
        $this->validate($request, [
            'reference'
        ]);
        $inputs= $request->all();
        $file = File::findOrFail($inputs['file_id']);

        $file->reference = $inputs['reference'];
        /* relations */
        $file->court_id = $inputs['sub_courts'];
        $file->office_id = '1'; /* get office id from connected user */
        
        $file->registration_date = $inputs['registration_date'];
        $file->type = $inputs['type'];
        $file->division = $inputs['division'];
        $file->subject = $inputs['subject'];
        $file->elementary_num =$inputs['elementary_num'];
        $file->decision_judge =$inputs['decision_judge'];
        $file->appellate_num =$inputs['appellate_num'];
        $file->appellate_judge =$inputs['appellate_judge'];
        $file->verdict =$inputs['verdict'];
        $file->verdict_date =$inputs['verdict_date'];
        $file->save();
        return response()->json();
    }

    
    public function delete($id)
    {
        //
    }
}
