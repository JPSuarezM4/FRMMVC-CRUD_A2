<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tomake;



class TomakesController extends Controller
{
    public function store(Request $request) {

        $request -> validate([
            'title' => 'required|min:3'
        ]);

        $tomake = new Tomake;
        $tomake->title = $request -> title;
        $tomake->save();

        return redirect()->route('tomakes')->with('success', 'Tarea creada correctamente');
    }


    public function index(){
        $tomakes = Tomake::all();

        return view('tomakes.index', ['tomakes' => $tomakes]);
    }

    public function show($id){
        $tomake = Tomake::find($id);

        return view('tomakes.show', ['tomake' => $tomake]);
    }

    public function update(Request $request, $id){
        $tomake = Tomake::find($id);
        $tomake->title = $request->title;
        $tomake->save();


        return redirect()->route('tomakes')->with('success' , 'Tarea actualizada');
    }

    public function destroy($id){
        $tomake = Tomake::find($id);
        $tomake -> delete();

        return redirect()->route('tomakes')->with('success' , 'Tarea eliminada');
    }
}
