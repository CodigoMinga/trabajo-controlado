<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\User;
use App\Item;
use DB;
use App\Client;
use Auth;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    public function list(){
        //Array de los clientes del Usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

        //Proyectos que pertenecesn a el clientes del Usuario
        $proyects = Proyect::whereIn('client_id',$clients_id)->get();

        return view('proyects.list',compact('proyects'));
    }

    public function add(){
        $users = User::all();

        //Array de los clientes del Usuario
        $clients = Auth::user()->clients()->get();

        $proyect = new Proyect;
        return view('proyects.form',compact('proyect', 'clients', 'users'));
    }
   
    public function details($proyect_id)
    {
        //Array de los clientes del Usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

        $proyect = Proyect::find($proyect_id);
        return view('proyects.form',compact('clients','proyect','users','items'));
    }

    public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $proyect = Proyect::findOrFail($request->id);
            $proyect->update($request->all());
            return redirect()->route('proyects.list')->with('success', 'Proyecto editado correctamente');
        }else{
            //Si no, Crea un Proyect
            Proyect::create($request->all());
            return redirect()->route('proyects.list')->with('success', 'Proyecto Agregado correctamente');
        }
    }

    public function delete($proyect_id)
    {
        $proyect = Proyect::findOrFail($proyect_id);
        $proyect->delete();
        return redirect()->route('proyects.list')->with('success', 'Proyecto eliminado correctamente');
    }
}
