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
        $user = new User;
        return view('users.form',compact('user'));
    }

    public function list(){
        $users = User::all();
        return view('users.list',compact('users'));
    }

    public function details($user_id){
        $user = User::findOrFail($user_id);
        return view('users.form',compact('user'));
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
