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
        $courts = Court::all();
        $count = File::all()->count();
        
        return view('files.index',['files' => $files,'courts' => $courts,'count' => $count]);
    }



   
    public function store(Request $request)
    {
        $file = new File();
        $this->validate($request, [
            'reference',
            'registration_date'
        ]);
        $inputs = $request->all();
        $file->reference = $inputs['reference'];
        /* relations */
        $file->court_id = $inputs['courts'];
        $file->office_id = '1'; /* get office id from connected user */
        
        $file->registration_date = $inputs['registration_date'];
        $file->type = $inputs['type'];
        $file->subject = $inputs['subject'];
        $file->elementary_num =$inputs['elementary_num'];
        $file->save();
        return response()->json();
    }

    
    public function liste()
    {
        $files = File::paginate(2);
        $count = File::all()->count();
        
        return response()->json(['files' => $files,'count' => $count]);
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function delete($id)
    {
        //
    }
}
