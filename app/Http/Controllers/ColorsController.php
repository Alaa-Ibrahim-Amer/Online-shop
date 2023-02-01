<?php

namespace App\Http\Controllers;
use App\Models\color;

use Illuminate\Http\Request;

class colorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.colors.color')->with([
            'colors' => color::paginate(5)
        ]);
    }

    function create()
    {
        return view('admin.colors.create');
    }

    function store(Request $request)
    {
        if(color::where('name', '=', $request->input('name'))->first()===null){
            $color = new color;
            $color['name'] = $request->input('name');
            $color->save();
        } else {
            return redirect()->action([ColorsController::class, 'index'])->with('warning', 'Record has not been added');
        }
        return redirect()->action([ColorsController::class, 'index']);
    }

     function destroy($id)
    {
        $color = color::findOrFail($id);
        color::destroy($id);
        return redirect()->action([ColorsController::class, 'index'])->with('success', 'Record has been deleted successfully!');
    }
}