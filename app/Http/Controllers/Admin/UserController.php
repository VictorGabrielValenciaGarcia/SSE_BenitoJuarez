<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function index(Request $request){

        $texto = $request->get('texto');
        $users = DB::table('users')
                        ->select('id','name','email')
                        -> where('name','LIKE', '%'.$texto.'%')
                        -> orWhere('email','LIKE', '%'.$texto.'%')
                        ->orderBy('id','asc')
                        ->paginate(6);
        return view('admin.Users.index', compact('users','texto'));
    }

    public function edit($id){

        $roles = Role::all();
        $user = User::find($id);
        return view('admin.Users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user){
        $user -> roles()->sync($request->rol);
        // dd($request->rol);
        return redirect()->route('admin.users.index', $user)->with('info', 'Roles asignados correctamente');
    }
}
