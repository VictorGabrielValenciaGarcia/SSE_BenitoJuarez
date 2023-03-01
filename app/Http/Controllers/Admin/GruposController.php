<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Grupos;
use App\Models\Admin\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $grupos = DB::table('grupos')
                    ->select('id','grado','nombre','numAlumnos')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('grado','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Grupos.list', compact('grupos','texto'));
    }
    // public function index()
    // {
    //     $grupos = Grupos::paginate(6);
    //     return view('admin.Grupos.list')
    //         ->with('grupos',$grupos);
    // }

    public function list(Request $request)
    {
        $texto = $request->get('texto');
        $grupos = DB::table('grupos')
                    ->select('id','grado','nombre','numAlumnos')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('grado','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Grupos.listActions', compact('grupos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Grupos.create');
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
            'nombre'=> 'required | max:14',//nombre del producto
            'numAlumnos'=> 'required | numeric',

            ],
            [

                'grado.required' => 'El grado del grupo es obligatorio',
                'nombre.required' => 'El nombre del grupo es obligatorio',
                'nombre.max' => 'Solo 14 caracteres',
                'numAlumnos.required' => 'La cantidad de alumnos del grupo está vacío',
                'numAlumnos.numeric' => 'La cantidad de alumnos del grupo debe ser un número',

            ]);

            // dd($request);

            //Registro de Productos
            // Si las validaciones son correctas registramos el producto
            $grupo = Grupos::create($request->only('grado','nombre','numAlumnos'));

            $grupo->save();
            return redirect()->route('grupos.index')->with('success','Grupo guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupos::findOrFail($id);

        $alumnos = Alumnos::all()->where('id_grupo','LIKE',$id);

        return view('admin.Grupos.show')->with(compact('grupo', 'alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupos::find($id);
        return view('admin.Grupos.create', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);

        $id = $request->input("id");

        $grupo = $request->validate([

            'grado'=>'required',
            'nombre'=> 'required | max:14',//nombre del producto
            'numAlumnos'=> 'required | numeric',

            ],
            [

                'grado.required' => 'El grado del grupo es obligatorio',
                'nombre.required' => 'El nombre del grupo es obligatorio',
                'nombre.max' => 'Solo 14 caracteres',
                'numAlumnos.required' => 'La cantidad de alumnos del grupo está vacío',
                'numAlumnos.numeric' => 'La cantidad de alumnos del grupo debe ser un número',

            ]);


        Grupos::whereId($id)->update($grupo);
        return redirect()->route('grupos.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        // dd($id);
        $grupo = Grupos::findOrFail($id);
        $grupo->delete();

        return back()->with('eliminar','Listo');;
    }
}
