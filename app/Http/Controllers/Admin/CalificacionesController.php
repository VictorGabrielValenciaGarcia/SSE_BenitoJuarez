<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Calificaciones;
use App\Models\Admin\Materias;
use App\Models\Admin\Alumnos;
use App\Models\Admin\Grupos;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grupos = Grupos::all();
        $materias = Materias::all();
        $grupo = Grupos::find($request->get('id_grupo'));
        // $materia = $request->get('id_materia');

        $materia = Materias::find($request->get('id_materia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $grupos = Grupos::all();
        $materias = Materias::all();

        $id_grupo = $request->get('id_grupo');
        $grupo = Grupos::find($request->get('id_grupo'));
        // $materia = $request->get('id_materia');

        $materia = Materias::find($request->get('id_materia'));

        $alumnos = Alumnos:: where('id_grupo','LIKE', $id_grupo)
                    ->orderBy('id','asc')
                    ->paginate(25);

        return view('admin.Calificaciones.create')->with(compact('grupos','materias','grupo','materia','alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $id_materia     = $request->id_materia;

        $id_alumno      = $request->id_alumno;
        $parcialUno     = $request->parcialUno;
        $parcialDos     = $request->parcialDos;
        $parcialTres    = $request->parcialTres;
        $promedioFinal  = $request->promedioFinal;

        for ($i=0; $i < count($id_alumno); $i++) {

            $datasave = [
                'id_materia'    => $id_materia,

                'id_alumno'     => $id_alumno[$i],
                'parcialUno'    => $parcialUno[$i],
                'parcialDos'    => 0,
                'parcialTres'   => 0,
                'promedioFinal' => 0,
            ];

            // return dd($datasave);
            DB::table('calificaciones')->insert($datasave);
        }
         return view('admin.Calificaciones.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificaciones $calificaciones)
    {
        //
    }
}
