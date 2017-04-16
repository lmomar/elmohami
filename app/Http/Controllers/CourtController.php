<?php

namespace App\Http\Controllers;

use App\Court;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class CourtController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
   
    
    public function index()
    {
        $courts_parents = Court::where('parent_id','0')->get();
        //dd($courts_parents);
        $courts = Court::where('parent_id','!=','0')->get();
        //dd($courts);
        return view('courts.index',['courts_parents' => $courts_parents,'courts' => $courts]);
    }

    /**
     * 
     * @param type $id => parent_id
     * @return JsonResponse
     */
    public function getCourts($id){
        $courts = Court::where('parent_id',$id)->get()->toArray();
        if(empty($courts))
        {
            return new JsonResponse('not found', \Illuminate\Http\Response::HTTP_NOT_FOUND);
        }
        //dd($courts);
        return response()->json(['courts' => $courts]);
        
    }
    
    
    public function create()
    {
        return view('courts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'court_name'
        ]);
        $inputs = $request->all();
        
        $court = new Court();
        $court->court_name = $inputs['court_name'];
        $court->parent_id = $inputs['parent_id'];
        $court->save();
        return response()->json();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        $court = Court::findOrFail($id);
        //Court::destroy($id);
        return response()->json();
    }
    
    
    public function getParentCourtBySubCourt($sub_id){
        $court = Court::find($sub_id);
        return response()->json(['parent_id' => $court->parent_id]);
    }
}
