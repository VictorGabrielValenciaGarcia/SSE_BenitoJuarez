<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Alumnos;
use App\Models\User;
use App\Models\Admin\Grupos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $texto = $request->get('texto');


        // $grupo = Alumnos::find(1)->grupo ?? '';
        // dd($grupo);

        $alumnos = Alumnos::with('grupo')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoP','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoM','LIKE', '%'.$texto.'%')
                    -> orWhere('matricula','LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Alumnos.list', compact('alumnos','texto'));
    }

    public function list(Request $request){
        $texto = $request->get('texto');
        // $grupo = Alumnos::find(1)->grupo ?? '';
        $alumnos = Alumnos::with('grupo')
        -> where('nombre','LIKE', '%'.$texto.'%')
        -> orWhere('apellidoP','LIKE', '%'.$texto.'%')
        -> orWhere('apellidoM','LIKE', '%'.$texto.'%')
        -> orWhere('matricula','LIKE', '%'.$texto.'%')
        ->orderBy('id','asc')
        ->paginate(6);
        return view('admin.Alumnos.listActions', compact('alumnos','texto'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $grupos = Grupos::all();
        return view('admin.Alumnos.create',compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([

            'matricula'=>'required | max:11',
            'nombre'=> 'required | max:30',
            'apellidoP'=> 'required | max:20',
            'apellidoM'=> 'required | max:20',
            'direccion'=> 'required | max:80',
            'CURP'=> 'required | max:18',
            'discapacidades'=> 'required ',
            'id_grupo'=> 'required | numeric', //Select
            'sexo'=> 'required', //Select
            'fechaRegistro'=> 'required | date',
            'password'=> 'required ',
            'correo'=> 'required | max:45 | email',
            'edad'=> 'required | numeric',

            ],
            [
                'matricula.required' => 'Matricula escolar obligatoria',
                'matricula.max' => 'Matricula escolar menor a 11 digitos',
                'nombre.required' => 'Nombre del alumno obligatorio',
                'nombre.max' => 'Nombre del alumno menor a 30 digitos',
                'apellidoP.required' => 'Apellido paterno obligatorio',
                'apellidoP.max' => 'Apellido paterno menor a 20 digitos',
                'apellidoM.required' => 'Apellido materno obligatorio',
                'apellidoM.max' => 'Apellido materno menor a 20 digitos',
                'direccion.required' => 'Direccion del alumno requerida',
                'direccion.max' => 'Direccion del alumno menor a 80 digitos',
                'CURP.required' => 'CURP del alumno requerida',
                'CURP.max' => 'CURP del alumno menor a 18 digitos',
                'discapacidades.required' => 'CURP del alumno requerida',
                'id_grupo.required' => 'Grupo del alumno requerido',
                'id_grupo.numeric' => 'Valor invalido',
                'sexo.required' => 'Genero del alumno requerido',
                'fechaRegistro.required' => 'Fecha de registro requerida',
                'fechaRegistro.date' => 'No es una fecha',
                'password.required' => 'Contraseña inicial requerida',
                'correo.required' => 'Correo del alumno requerido',
                'correo.max' => 'Correo del alumno menor a 45 digitos',
                'edad.required' => 'Edad del alumno requerida',
                'edad.email' => 'No es un correo electronico',
                'edad.numeric' => 'No es un numero',
            ]);

            // dd($request);


            $name = "{$request->nombre} {$request->apellidoP} {$request->apellidoM}";
            $email = $request->correo;
            $pass = $request->password;

            $alumno = Alumnos::create($request->only(
                'matricula',
                'nombre',
                'apellidoP',
                'apellidoM',
                'direccion',
                'CURP',
                'discapacidades',
                'id_grupo',
                'sexo',
                'fechaRegistro',
                'password',
                'correo',
                'edad'
            ));
            $alumno->save();

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($pass),
            ])->assignRole('Alumno');
            $user->save();

            return redirect()->route('alumnos.index')->with('success','Alumno registrado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumnos::findOrFail($id);

        $grupo = Grupos::where('id','=',$alumno->id_grupo)->first();

        return view('admin.Alumnos.show')->with(compact('alumno','grupo'),'tutores');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupos = Grupos::all();
        $alumno = Alumnos::find($id);
        return view('admin.Alumnos.create', compact('alumno','grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->input("id");

        $alumno = $request->validate([

            'matricula'=>'required | max:11',
            'nombre'=> 'required | max:30',
            'apellidoP'=> 'required | max:20',
            'apellidoM'=> 'required | max:20',
            'direccion'=> 'required | max:80',
            'CURP'=> 'required | max:18',
            'discapacidades'=> 'required ',
            'id_grupo'=> 'required | numeric', //Select
            'sexo'=> 'required', //Select
            'fechaEgreso'=> 'date',
            'promedio'=> 'required | numeric | min:0 | max:10',
            'correo'=> 'required | max:45 | email',
            'edad'=> 'required | numeric',

            ],
            [
                'matricula.required' => 'Matricula escolar obligatoria',
                'matricula.max' => 'Matricula escolar menor a 11 digitos',
                'nombre.required' => 'Nombre del alumno obligatorio',
                'nombre.max' => 'Nombre del alumno menor a 30 digitos',
                'apellidoP.required' => 'Apellido paterno obligatorio',
                'apellidoP.max' => 'Apellido paterno menor a 20 digitos',
                'apellidoM.required' => 'Apellido materno obligatorio',
                'apellidoM.max' => 'Apellido materno menor a 20 digitos',
                'direccion.required' => 'Direccion del alumno requerida',
                'direccion.max' => 'Direccion del alumno menor a 80 digitos',
                'CURP.required' => 'CURP del alumno requerida',
                'CURP.max' => 'CURP del alumno menor a 18 digitos',
                'discapacidades.required' => 'CURP del alumno requerida',
                'id_grupo.required' => 'Grupo del alumno requerido',
                'id_grupo.numeric' => 'Valor invalido',
                'sexo.required' => 'Genero del alumno requerido',
                'fechaEgreso.date' => 'No es una fecha',
                'promedio.required' => 'Contraseña inicial requerida',
                'promedio.numeric' => 'No es un promedio valido',
                'promedio.max' => 'El promedio general no puede ser mayor a 10',
                'promedio.min' => 'El promedio general no puede ser menor a 0',
                'correo.required' => 'Correo del alumno requerido',
                'correo.max' => 'Correo del alumno menor a 45 digitos',
                'edad.required' => 'Edad del alumno requerida',
                'edad.email' => 'No es un correo electronico',
                'edad.numeric' => 'No es un numero',
            ]);

            Alumnos::whereId($id)->update($alumno);
            return redirect()->route('alumnos.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumnos::findOrFail($id);
        $alumno->delete();

        return back()->with('eliminar','Listo');
    }
}
