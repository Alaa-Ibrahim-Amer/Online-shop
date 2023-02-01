<?php

namespace App\Http\Controllers;
use App\Models\size;
use Illuminate\Http\Request;

class sizesController extends Controller
{
    public function index()
    {
        return view('admin.sizes.size')->with([
            'sizes' => size::paginate(5)
        ]);
    }

    function create()
    {
        return view('admin.sizes.create');
    }

    function store(Request $request)
    {   
        size::where('name', '=', $request->input('name'))->first();
        if(size::where('name', '=', $request->input('name'))->first()===null){
            $size = new size;
            $size['name'] = $request->input('name');
            $size->save();
        } else {
            return redirect()->action([SizesController::class, 'index'])->with('warning', 'Record has not been added');
        }
        return redirect()->action([SizesController::class, 'index']);
    }

     function destroy($id)
    {
        $size = size::findOrFail($id);
        size::destroy($id);
        return redirect()->action([SizesController::class, 'index'])->with('success', 'Record has been deleted successfully!');
    }
}