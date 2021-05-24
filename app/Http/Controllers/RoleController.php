<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Client;
use DB;
use Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function add(){

        $roles = Role::all();
        $clients = Client::all();
        return view('users.add',compact('roles', 'clients'));
    }
    public function list(){

        //1 clients a la que pertenece el usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

        //Consultar a la tabla client_user las id de los usuarios que pertenecen a los clients dichas
        $users_id= DB::table('client_user')->whereIn('client_id',$clients_id)->pluck('user_id')->toArray();

        //buscar los usuarios con las id obtenidas
        $users = User::WhereIn('id',$users_id)->get();
 
        return view('users.list' , \compact('users'));
    }
    public function editprocess($user_id, Request $request)
{
    //busca la orden en la base de datos con el id que se le pasa desde la URL
    $user = User::findOrFail($user_id);

    $user->update($request->all());

    return redirect()->route('users.list')->with('success', 'Usuario editado correctamente');
}
public function details($user_id)
{
 
    $roles = Role::all();
  
    return view('users.details',compact('roles') ,[
        'user' => User::find($user_id)
    ]);
}
public function addProcess(Request $request){
    User::create($request->all());
    return redirect()->route('users.list')->with('success', 'Usuario Creado correctamente');
}
}
