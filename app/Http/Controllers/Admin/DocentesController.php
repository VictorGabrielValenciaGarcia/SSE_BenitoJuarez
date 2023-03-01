<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Admin\Docentes;
use App\Models\User;
use App\Models\Admin\Materias;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $texto = $request->get('texto');
        // $materia = Docentes::find(11)->materia ?? '';

        $docentes = Docentes::with('materia')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoP','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoM','LIKE', '%'.$texto.'%')
                    // -> orWhere($materia->nombre,'LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Docentes.list', compact('docentes','texto'));
    }

    public function list(Request $request){
        $texto = $request->get('texto');
        $docentes = Docentes::with('materia')
                    -> where('nombre','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoP','LIKE', '%'.$texto.'%')
                    -> orWhere('apellidoM','LIKE', '%'.$texto.'%')
                    // -> orWhere($materia->nombre,'LIKE', '%'.$texto.'%')
                    ->orderBy('id','asc')
                    ->paginate(6);
        return view('admin.Docentes.listActions', compact('docentes','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materias::all();
        return view('admin.Docentes.create',compact('materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([

            'RFC'=>'required | max:13',
            'nombre'=> 'required | max:30',
            'apellidoP'=> 'required | max:20',
            'apellidoM'=> 'required | max:20',

            'direccion'=> 'required | max:80',
            'sexo'=> 'required', //Select
            'fechaIngreso'=> 'required | date',
            'telefono'=> 'required | max:15',

            'correo'=> 'required | max:45 | email',
            'password'=> 'required ',
            'areaFormacion'=> 'required',
            'id_materia'=> 'required | numeric', //Select



            ],
            [
                'RFC.required' => 'RFC obligatorip',
                'RFC.max' => 'El RFC es menor a 13 digitos',
                'nombre.required' => 'Nombre del docente obligatorio',
                'nombre.max' => 'Nombre del docente menor a 30 digitos',
                'apellidoP.required' => 'Apellido paterno obligatorio',
                'apellidoP.max' => 'Apellido paterno menor a 20 digitos',
                'apellidoM.required' => 'Apellido materno obligatorio',
                'apellidoM.max' => 'Apellido materno menor a 20 digitos',
                'direccion.required' => 'Direccion del docente requerida',
                'direccion.max' => 'Direccion del docente menor a 80 digitos',
                'correo.required' => 'Correo del docente requerido',
                'correo.max' => 'Correo del docente menor a 45 digitos',
                'correo.email' => 'No es un correo valido',
                'password.required' => 'Contraseña inicial requerida',
                'areaFormacion.required' => 'Area de Formacion requerida',
                'sexo.required' => 'Genero del docente requerido',
                'fechaIngreso.required' => 'Fecha de registro requerida',
                'fechaIngreso.date' => 'No es una fecha',
                'id_materia.required' => 'Grupo del docente requerido',
                'id_materia.numeric' => 'Valor invalido',
                'telefono.required' => 'Telefono del docente requeridp',
                'telefono.max' => 'Telefono del docente menor a 15 caracteres',
            ]);

            // dd($request);

            $name = "{$request->nombre} {$request->apellidoP} {$request->apellidoM}";
            $email = $request->correo;
            $pass = $request->password;

            $docente = Docentes::create($request->only(
                'RFC',
                'nombre',
                'apellidoP',
                'apellidoM',
                'direccion',
                'correo',
                'password',
                'areaFormacion',
                'sexo',
                'fechaIngreso',
                'telefono',
                'id_materia'
            ));

            $docente->save();

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($pass),
            ])->assignRole('Docente');
            $user->save();

            return redirect()->route('docentes.index')->with('success','Docente registrado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docentes::findOrFail($id);

        $materia = Materias::where('id','=',$docente->id_materia)->first();

        return view('admin.Docentes.show')->with(compact('docente','materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materias = Materias::all();
        $docente = Docentes::find($id);
        return view('admin.Docentes.create', compact('docente','materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docentes $docentes)
    {
        $id = $request->input("id");

        $docente = $request->validate([

            'RFC'=>'required | max:13',
            'nombre'=> 'required | max:30',
            'apellidoP'=> 'required | max:20',
            'apellidoM'=> 'required | max:20',

            'direccion'=> 'required | max:80',
            'sexo'=> 'required', //Select
            // 'fechaBaja'=> 'date',
            'telefono'=> 'required | max:15',

            'correo'=> 'required | max:45 | email',
            'password'=> 'required ',
            'areaFormacion'=> 'required',
            'id_materia'=> 'required | numeric', //Select



            ],
            [
                'RFC.required' => 'RFC obligatorip',
                'RFC.max' => 'El RFC es menor a 13 digitos',
                'nombre.required' => 'Nombre del docente obligatorio',
                'nombre.max' => 'Nombre del docente menor a 30 digitos',
                'apellidoP.required' => 'Apellido paterno obligatorio',
                'apellidoP.max' => 'Apellido paterno menor a 20 digitos',
                'apellidoM.required' => 'Apellido materno obligatorio',
                'apellidoM.max' => 'Apellido materno menor a 20 digitos',
                'direccion.required' => 'Direccion del docente requerida',
                'direccion.max' => 'Direccion del docente menor a 80 digitos',
                'correo.required' => 'Correo del docente requerido',
                'correo.max' => 'Correo del docente menor a 45 digitos',
                'correo.email' => 'No es un correo valido',
                'password.required' => 'Contraseña inicial requerida',
                'areaFormacion.required' => 'Area de Formacion requerida',
                'sexo.required' => 'Genero del docente requerido',
                'fechaBaja.required' => 'Fecha de registro requerida',
                'fechaBaja.date' => 'No es una fecha',
                'id_materia.required' => 'Grupo del docente requerido',
                'id_materia.numeric' => 'Valor invalido',
                'telefono.required' => 'Telefono del docente requeridp',
                'telefono.max' => 'Telefono del docente menor a 15 caracteres',
            ]);

            Docentes::whereId($id)->update($docente);
            return redirect()->route('docentes.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docentes::findOrFail($id);
        $docente->delete();

        return back()->with('eliminar','Listo');
    }
}
