<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sitting;
use App\File;
class SittingController extends Controller{
    
    public function create() {
        return view('sittings.create');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'sitting_date',
            'next_procedure',
            'Verdict'
        ]);
        $inputs = $request->all();
        $sitting = new Sitting();
        $sitting->sitting_date = $inputs['sitting_date'];
        $sitting->next_procedure = $inputs['next_procedure'];
        $sitting->Verdict = $inputs['Verdict'];
        $sitting->file_reference = $inputs['file_reference'];
        $sitting->save();
        return redirect()->route('sittings')->with('success','Sitting saved');
                
    }
    
    public function edit($id) {
        $sitting = Sitting::findOrFail($id);
        $files = File::select('file_reference','elementary_num')->get();
        return view('sittings.edit',['sitting' => $sitting])->with('files',$files);
    }
    
    public function update(Request $request,$id){
        $this->validate($request, [
            'sitting_date',
            'next_procedure',
            'Verdict'
        ]);
        $inputs = $request->all();
        $sitting = Sitting::findOrFail($id);
        $sitting->sitting_date = $inputs['sitting_date'];
        $sitting->next_procedure = $inputs['next_procedure'];
        $sitting->Verdict = $inputs['Verdict'];
        $sitting->file_reference = $inputs['file_reference'];
        $sitting->save();
        return redirect()->route('sittings')->with('success','Sitting updated');
    }
    
    public function delete($id){
        $sitting = Sitting::findOrFail($id);
        
        if(empty($sitting))
        {
            return redirect()->route('sittings')->with('error','Sitting not found');
        }
        Sitting::destroy($id);
        return redirect()->route('sittings')->with('success','Sitting deleted');
    }
    
    public function index() {
        $sittings = Sitting::all();
        return view('sittings.index',['sittings' => $sittings]);
    }
}