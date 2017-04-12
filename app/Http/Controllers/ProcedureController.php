<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Procedure;

class ProcedureController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'proc_date',
            'type',
            'file_id'
        ]);
        $data = $request->all();
        $proc = new Procedure();
        if($data['proc-1-heure'] !=='0'){
            $heure1 = $data['proc-1-heure'] . ':' . $data['proc-1-minute'] . ':00';
            $proc->proc_date = $data['proc_date'] . ' ' . $heure1;
        }
        $proc->proc_date = $data['proc_date'];
        //dd($heure1);
        


        $proc->type = $data['type'];
        $proc->decision = $data['decision'];
        if($data['proc-2-heure'] !=='0')
        {
            $heure2 = $data['proc-2-heure'] . ':' . $data['proc-2-minute'] . ':00';
            $proc->next_sitting = $data['next_sitting'] . ' ' . $heure2;
        }
        $proc->next_sitting = $data['next_sitting'];
        
        $proc->file_id = $data['proc_file_id'];
        //dd($proc);
        $proc->save();
        return response()->json();
    }

    public function all($file_id) {
        $procedures = Procedure::where('file_id', $file_id)->orderBy('proc_date', 'desc')->paginate(5);
        $count = Procedure::where('file_id', $file_id)->count();
        return response()->json(['procedures' => $procedures, 'count' => $count]);
    }

    public function getProcedure($id) {
        $proc = Procedure::find($id);
        if (empty($proc)) {
            return response()->json(['message' => 'not found'], 404);
        }
        return response()->json(['procedure' => $proc]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'proc_date',
            'proc_id' /* validate procedure id before updating (js)*/
        ]);
        $data = $request->all();
        $proc = Procedure::find($data['proc_id']);
        if (empty($proc)) {
            return response()->json(['message' => 'not found'], 404);
        }
        if ($data['proc_date'] && isset($data['proc_date'])) {
            $heure1 = $data['proc-1-heure'] . ':' . $data['proc-1-minute'] . ':00';
            $proc->proc_date = $data['proc_date'] . ' ' . $heure1;
        }

        $proc->type = $data['type'];
        $proc->decision = $data['decision'];
        if ($data['next_sitting'] && isset($data['next_sitting'])) {
            $heure2 = $data['proc-2-heure'] . ':' . $data['proc-2-minute'] . ':00';
            $proc->next_sitting = $data['next_sitting'] . ' ' . $heure2;
        }
        $proc->save();
        return response()->json(compact('proc'));
    }

}
