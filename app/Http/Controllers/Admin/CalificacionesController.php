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

            $materias = Materias::all();
            $alumnos = Alumnos::all();
        // dd($request);
            $id_alumno = $request->get('id_alumno');
            $id_asignatura = $request->get('id_materia');

            if ($request) {

                if ($id_alumno == null && $id_asignatura == null) {
                    $calificaciones = Calificaciones::with('alumno', 'materia')
                    ->orderBy('id','asc')
                    ->paginate(8);
                } else {

                    if ($id_alumno != null && $id_asignatura == null) {
                        $calificaciones = Calificaciones::with('alumno', 'materia')
                        -> where('id_alumno','LIKE', $id_alumno)
                        // -> orWhere('id_materia','LIKE', $id_asignatura)
                        ->orderBy('id','asc')
                        ->paginate(8);
                    } else {

                        if ($id_alumno == null && $id_asignatura != null) {
                            $calificaciones = Calificaciones::with('alumno', 'materia')
                            // -> where('id_alumno','LIKE', $id_alumno)
                            -> where('id_materia','LIKE', $id_asignatura)
                            ->orderBy('id','asc')
                            ->paginate(8);
                        } else {
                            $calificaciones = Calificaciones::with('alumno', 'materia')
                            -> where('id_alumno','LIKE', $id_alumno)
                            -> where('id_materia','LIKE', $id_asignatura)->orderBy('id','asc')
                            ->paginate(1);
                        }


                    }


                }
            }

            return view('admin.Calificaciones.index')->with(compact('materias','alumnos','calificaciones'));

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
        return redirect()->route('calif.index');
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
    public function edit($id)
    {
        $calificacion = Calificaciones::find($id);

        $alumno = Alumnos::where('id','LIKE',$calificacion->id_alumno);
        $materia = Materias::where('id','LIKE',$calificacion->id_materia);

        return view('admin.Calificaciones.edit', compact('calificacion','alumno','materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->input("id");

        $calificacion = $request->validate([

            'parcialUno'=> 'required | max:10 | min:0',
            'parcialDos'=> 'required | max:10 | min:0',
            'parcialTres'=> 'required | max:10 | min:0',
            'promedioFinal'=> 'required | max:10 | min:0',
            'id_materia'=> 'required',
            'id_alumno'=> 'required',

            ],
            [
                'parcialUno.required' => 'La calificacion el Primer Parcial no puede estar vacia',
                'parcialUno.max' => 'No es una calificacion valida',
                'parcialUno.min' => 'No es una calificacion valida',

                'parcialDos.required' => 'La calificacion el Segundo Parcial no puede estar vacia',
                'parcialDos.max' => 'No es una calificacion valida',
                'parcialDos.min' => 'No es una calificacion valida',

                'parcialTres.required' => 'La calificacion el Tercer Parcial no puede estar vacia',
                'parcialTres.max' => 'No es una calificacion valida',
                'parcialTres.min' => 'No es una calificacion valida',

                'promedioFinal.required' => 'La calificacion el Tercer Parcial no puede estar vacia',
                'parcialTres.max' => 'No es una calificacion valida',
                'parcialTres.min' => 'No es una calificacion valida',
            ]);

            Calificaciones::whereId($id)->update($calificacion);
            return redirect()->route('calif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calificacion = Calificaciones::findOrFail($id);
        $calificacion->delete();

        return back()->with('eliminar','Listo');
    }
}
