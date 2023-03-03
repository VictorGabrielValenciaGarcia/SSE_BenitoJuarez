<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\Admin\Tutores;
use App\Models\Admin\Alumnos;
use App\Models\Admin\AlumnosTutores;
use Illuminate\Http\Request;

class TutoresController extends Controller
{

    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $tutores = DB::table('tutores')
                    ->select('nombre',
                            'apellidoP',
                            'apellidoM',
                            'sexo',
                            'telefonoCasa',
                            'telefono',)
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoP','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoM','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(8);
        return view('admin.Tutores.list', compact('tutores','texto'));
    }

    public function list(Request $request){
        $texto = $request->get('texto');
        $tutores = DB::table('tutores')
                    ->select('id',
                            'nombre',
                            'apellidoP',
                            'apellidoM',
                            'sexo',
                            'telefonoCasa',
                            'telefono',)
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoP','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoM','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(8);
        return view('admin.Tutores.listActions', compact('tutores','texto'));
    }

    public function create(){
        return view('admin.Tutores.create');
    }

    public function store(Request $request){
        $request->validate([

        'nombre'=> 'required | max:30',
        'apellidoP'=> 'required | max:20',
        'apellidoM'=> 'required | max:20',

        'sexo'=> 'required', //Select
        'telefono'=> 'required | max:30',
        'telefonoCasa'=> 'required | max:30',
        'direccion'=> 'required | max:80',

        // 'tutorado1'=> 'required',
        // 'tutorado2'=> 'required',
        // 'tutorado3'=> 'required',
        ],
        [

            'nombre.required' => 'Nombre del tutor obligatorio',
            'nombre.max' => 'Nombre del tutor menor a 30 digitos',
            'apellidoP.required' => 'Apellido paterno obligatorio',
            'apellidoP.max' => 'Apellido paterno menor a 20 digitos',
            'apellidoM.required' => 'Apellido materno obligatorio',
            'apellidoM.max' => 'Apellido materno menor a 20 digitos',

            'direccion.required' => 'Direccion del tutor requerida',
            'direccion.max' => 'Direccion del tutor menor a 80 digitos',
            'sexo.required' => 'Genero del tutor requerido',


            'telefono.required' => 'Telefono del tutor requerido',
            'telefono.max' => 'Telefono del tutor menor a 30 caracteres',
            'telefonoCasa.required' => 'Telefono Fijo del tutor requerido',
            'telefonoCasa.max' => 'Telefono Fijo del tutor menor a 30 caracteres',
        ]);

            // dd($request);

            $tutor = Tutores::create($request->only(
                'nombre',
                'apellidoP',
                'apellidoM',
                'sexo',

                'telefono',
                'telefonoCasa',
                'direccion',
            ));

            $tutor->save();
            return redirect()->route('tutores.index')->with('success','Docente registrado');

    }

    public function show($id){

        $tutor = Tutores::findOrFail($id);
        // dd($tutor);
        return view('admin.Tutores.show')->with(compact('tutor'),'alumnos');
    }

    public function edit($id){
        $tutor = Tutores::find($id);
        return view('admin.Tutores.create', compact('tutor'));
    }

    public function update(Request $request, Tutores $tutores){

        $id = $request->input("id");
        $tutor = $request->validate([

            'nombre'=> 'required | max:30',
            'apellidoP'=> 'required | max:20',
            'apellidoM'=> 'required | max:20',

            'sexo'=> 'required', //Select
            'telefono'=> 'required | max:30',
            'telefonoCasa'=> 'required | max:30',
            'direccion'=> 'required | max:80',

            // 'tutorado1'=> 'required',
            // 'tutorado2'=> 'required',
            // 'tutorado3'=> 'required',
            ],
            [

                'nombre.required' => 'Nombre del tutor obligatorio',
                'nombre.max' => 'Nombre del tutor menor a 30 digitos',
                'apellidoP.required' => 'Apellido paterno obligatorio',
                'apellidoP.max' => 'Apellido paterno menor a 20 digitos',
                'apellidoM.required' => 'Apellido materno obligatorio',
                'apellidoM.max' => 'Apellido materno menor a 20 digitos',

                'direccion.required' => 'Direccion del tutor requerida',
                'direccion.max' => 'Direccion del tutor menor a 80 digitos',
                'sexo.required' => 'Genero del tutor requerido',


                'telefono.required' => 'Telefono del tutor requerido',
                'telefono.max' => 'Telefono del tutor menor a 30 caracteres',
                'telefonoCasa.required' => 'Telefono Fijo del tutor requerido',
                'telefonoCasa.max' => 'Telefono Fijo del tutor menor a 30 caracteres',
            ]);

            Tutores::whereId($id)->update($tutor);
            return redirect()->route('tutores.list');
    }

    public function destroy($id){
        $tutor = Tutores::findOrFail($id);
        $tutor->delete();

        return back()->with('eliminar','Listo');
    }

    // ** Tutores Alumnos **

    public function assingments(Request $request){
        $asignaciones = AlumnosTutores::paginate(10);
        return view('admin.Asignaciones.listActions')->with(compact('asignaciones'), 'tutor', 'alumno');
    }

    public function assing(){

        $tutores = Tutores::all();
        $alumnos = Alumnos::all();

        return view('admin.Asignaciones.create')->with(compact('tutores', 'alumnos'));
    }

    public function assingTutor(Request $request){
        $request->validate([

            'id_alumno'=> 'required | numeric',
            'id_tutor'=> 'required | numeric',
            'parentesco'=> 'required',

        ],
        [

            'id_alumno.required' => 'El alumno a vincular es requerido',
            'id_alumno.numeric' => 'No es valor valido',
            'id_tutor.required' => 'El tutor del alumno es requerido',
            'id_tutor.numeric' => 'No es valor valido',
            'parentesco.required' => 'Parentesco del Tutor Obligatorio',
        ]);

        $asignacion = AlumnosTutores::create($request->only(
            'id_alumno',
            'id_tutor',
            'parentesco',
        ));

        $asignacion->save();
        return redirect()->route('tutores.list')->with('success','Relacion registrada');
    }

    public function reassing($id){
        $asignacion = AlumnosTutores::find($id);

        $tutorActual = Tutores::find($asignacion->id_tutor);
        $tutoradoActual = Alumnos::find($asignacion->id_alumno);

        $tutores = Tutores::all();
        $alumnos = Alumnos::all();
        // dd($alumnos);
        // return $asignacion;
        return view('admin.Asignaciones.create')->with(compact('tutores','alumnos','asignacion','tutorActual', 'tutoradoActual'));
    }

    public function reassingTutor(Request $request, Tutores $tutores){
        $id = $request->input("id");
        // dd($request);
        $asignacion = $request->validate([

            'id_alumno'=> 'required | numeric',
            'id_tutor'=> 'required | numeric',
            'parentesco'=> 'required',

        ],
        [

            'id_alumno.required' => 'El alumno a vincular es requerido',
            'id_alumno.numeric' => 'No es valor valido',
            'id_tutor.required' => 'El tutor del alumno es requerido',
            'id_tutor.numeric' => 'No es valor valido',
            'parentesco.required' => 'Parentesco del Tutor Obligatorio',
        ]);

        AlumnosTutores::whereId($id)->update($asignacion);
        return redirect()->route('tutores.assingments');
    }

    public function destroyAssig($id){
        $asignacion = AlumnosTutores::findOrFail($id);
        $asignacion->delete();

        return back()->with('eliminar','Listo');
    }
}

?>
