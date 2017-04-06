<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Procedure;
class ProcedureController extends Controller{
   
    public function store(Request $request){
        $this->validate($request,[
           'proc_date' ,
            'type',
        ]);
        $data = $request->all();
        $proc = new Procedure();
        
        $heure = $data['proc-1-heure'] + ':' + $data['proc-1-minute'];
        $proc->proc_date = $data['proc_date'];
        
        
        $proc->type = $data['type'];
        $proc->decision = $data['decision'];
        $proc->next_sitting = $data['next_sitting'];
        $proc->file_id = $data['proc_file_id'];
        $proc->save();
        return response()->json();
    }
    
    
    public function all($file_id){
        $procedures = Procedure::where('file_id',$file_id)->paginate(5);
        $count = Procedure::where('file_id',$file_id);
        return response()->json(['procedures' => $procedures,'count' => $count]);
    }
}