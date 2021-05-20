<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Hash;
use App\User;
use App\Role;
use App\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(){
        $role_ids=[1,2];
        if(Auth::user()->hasRole('superadmin')){
            $role_ids=[1,2,3];
        }
        $clients = Auth::user()->clients;
        $roles = Role::whereIn("id",$role_ids)->get();
        $user = new User;
        return view('users.form',compact('roles','clients','user'));
    }

    public function list(){
        //clientes a los que pertenece el usuario
       // $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
        //Consultar a la tabla client_user las id de los usuarios que pertenecen a las compañias dichas
       // $users_id= DB::table('client_user')->whereIn('client_id',$clients_id)->pluck('user_id')->toArray();
        //buscar los usuarios con las id obtenidas
        $users = User::WhereIn('id',$users_id)->get();
        return view('users.list',compact('users'));
    }

    public function details($user_id){
        $role_ids=[1,2];
        if(Auth::user()->hasRole('superadmin')){
            $role_ids=[1,2,3];
        }
        $clients = Auth::user()->clients;
        $roles = Role::whereIn("id",$role_ids)->get();
        $user = User::findOrFail($user_id);
        return view('users.form',compact('roles','clients','user'));
    }
    public function delete($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->email=null;
            $user->enabled=0;
            $user->save();
            return redirect()->route('users.list')->with('success', 'Usuario eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('users.list')->with('error', 'Problema al eliminar usuario');
        }
    }

    public function process(Request $request){
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $user = User::findOrFail($id);
            $user->name =  $request->name;
            $user->email =  $request->email;
            if($request->newpassword){
                $user->password = bcrypt($request->password);
            }
            $user->save();

            //BORRA clientes ANTIGUAS
            DB::table('client_user')->where('user_id', $id)->delete();
            //BORRA ROLES ANTIGUOS
            DB::table('role_user')->where('user_id', $id)->delete();

            //RENUEVA Clientes
            $client_ids = $request->client_id;
            foreach ($client_ids as $key => $client_id) {
                $client = Client::findOrFail($client_id);
                $user->clients()->attach($client);
            }

            //RENUEVA ROLES
            $role_ids = $request->role_id;
            foreach ($role_ids as $key => $role_id) {
                $role = Role::findOrFail($role_id);
                $user->roles()->attach($role);
            }

            return redirect()->route('users.list')->with('success', 'Usuario editado correctamente');
        }else{
            //Si no, Crea un Item        
            $user = new User;
            $user->name =  $request->name;
            $user->email =  $request->email;
            $user->rut =  $request->rut;
            $user->phone =  $request->phone;
            $user->password = bcrypt($request->password);

            $user->save();

            //ADJUNTA ROLES
            $role_ids = $request->role_id;
            foreach ($role_ids as $key => $role_id) {
                $role = Role::findOrFail($role_id);
                $user->roles()->attach($role);
            }

            //ADJUNTA Clientes
            $client_ids = $request->client_id;
            foreach ($client_ids as $key => $client_id) {
                $client = Client::findOrFail($client_id);
                $user->clients()->attach($client);
            }

            return redirect()->route('users.list')->with('success', 'Usuario creado correctamente');
        }
    }

    public function passwordchangeProcess(Request $request){

        $user = Auth::user();
        $oldpassword = $request->oldpassword;

        if(Hash::check($oldpassword,$user->password)){
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
            $user->update($input);

            $userAutentificated = Auth::loginUsingId($user->id);
            return back()->with('success', 'Contraseña cambiada correctamente');
        }else{
            return back()->with('error','La clave antigua no corresponde')->withInput();
        }
    }
}
