<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sitting;
use Response;
use App\Http\Requests;
use Validator;


class SittingController extends Controller {

    public function manageVue()
    {
        return view('sittings.index');
    }

    public function index()
    {
        $items = Sitting::latest()->paginate(5);

        $response = [
            'pagination' => [
                'total' => $items->total(),
                'per_page' => $items->perPage(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem()
            ],
            'data' => $items
        ];
        return response()->json($response);
    }


    public function store(Request $request) {
        $this->validate($request, [
            'sitting_date',
        ]);

        Sitting::create($request->all());
        return redirect()->route('sittings');
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'sitting_date' => 'required',
            'file_id' => 'required',
        ]);
        $edit = Sitting::find($id)->update($request->all());
        return response()->json($edit);
    }

    public function destroy($id)
    {
        Sitting::find($id)->delete();
        return response()->json(['done']);
    }
}