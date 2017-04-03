<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sitting;
use App\File;
use Illuminate\Support\Facades\DB;

class SittingController extends Controller {

    public function create() {
        $files = File::select('id', 'reference')->get();
        return view('sittings.create')->with('files', $files);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'sitting_date',
        ]);
        $inputs = $request->all();
        $sitting = new Sitting();
        $sitting->sitting_date = $inputs['sitting_date'];
        $sitting->devision = $inputs['devision'];
        $sitting->nature = $inputs['nature'];
        $sitting->file_id = $inputs['file_id'];
        $sitting->save();
        //dd($sitting);
        return response()->json();
    }

    public function edit($id) {
        $sitting = Sitting::findOrFail($id);
        $files = File::select('id', 'reference')->get();
        return view('sittings.edit', ['sitting' => $sitting])->with('files', $files);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'sitting_date',
        ]);
        $inputs = $request->all();
        $sitting = Sitting::findOrFail($id);
        $sitting->sitting_date = $inputs['sitting_date'];
        $sitting->devision = $inputs['devision'];
        $sitting->nature = $inputs['nature'];
        $sitting->file_id = $inputs['file_id'];
        $sitting->save();
        return redirect()->route('sittings')->with('success', 'Sitting updated');
    }

    public function delete($id) {
        $sitting = Sitting::findOrFail($id);

        if (empty($sitting)) {
            return redirect()->route('sittings')->with('error', 'Sitting not found');
        }
        Sitting::destroy($id);
        return response()->json();
        //return redirect()->route('sittings')->with('success','Sitting deleted');
    }

    public function index() {
        $files = File::select('id', 'reference')->get();
        $sittings = DB::table('sittings')->join('files','files.id','sittings.file_id')->select('sittings.*','files.reference')->get();
        return view('sittings.index', ['sittings' => $sittings])->with('files', $files);
    }
    
    

}
