<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\Admin\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $materias = DB::table('materias')
                    ->select('id','grado','nombre')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('grado','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Materias.list', compact('materias','texto'));
    }

    public function list(Request $request)
    {
        $texto = $request->get('texto');
        $materias = DB::table('materias')
                    ->select('id','grado','nombre')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('grado','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Materias.listActions', compact('materias','texto'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Materias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'grado'=>'required',
            'nombre'=> 'required | max:30',//nombre del producto

            ],
            [

                'grado.required' => 'El grado del grupo es obligatorio',
                'nombre.required' => 'El nombre del grupo es obligatorio',
                'nombre.max' => 'Solo 30 caracteres',

            ]);

            // dd($request);

            //Registro de Productos
            // Si las validaciones son correctas registramos el producto
            $materia = Materias::create($request->only('grado','nombre'));

            $materia->save();
            return redirect()->route('materias.index')->with('success','Materia añadida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = Materias::findOrFail($id);
        return view('admin.Materias.show')->with(compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materias::find($id);
        return view('admin.Materias.create', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);

        $id = $request->input("id");

        $materia = $request->validate([

            'grado'=>'required',
            'nombre'=> 'required | max:30',//nombre del producto

            ],
            [

                'grado.required' => 'El grado de la materia es obligatorio',
                'nombre.required' => 'El nombre de la materia es obligatorio',
                'nombre.max' => 'Solo 30 caracteres',

            ]);


        Materias::whereId($id)->update($materia);
        return redirect()->route('materias.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        // dd($id);
        $materia = Materias::findOrFail($id);
        $materia->delete();

        return back()->with('eliminar','Listo');;
    }
}
