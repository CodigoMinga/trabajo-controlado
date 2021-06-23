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
        //Proyectos que pertenecesn a el clientes del Usuario
        $proyects = Proyect::all();
        foreach ($proyects as $key => $proyect) {
            $proyect -> client;
            $proyect -> user;
        }

        return view('proyects.list',compact('proyects'));
    }

    public function add(){
        $users = User::all();

        //Array de los clientes del Usuario
        $clients = Client::all();

        $proyect = new Proyect;
        return view('proyects.form',compact('proyect', 'clients', 'users'));
    }
   
    public function details($proyect_id)
    {
        $items= Item::all();
        $clients = Client::all();
        $users = User::all();
        $proyect = Proyect::find($proyect_id);
        
        return view('proyects.form',compact('proyect','clients','users','items'));
    }

    public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $proyect = Proyect::findOrFail($request->id);
            $worker_ids = $request->worker_id;
            if($worker_ids !=null){
                foreach ($worker_ids as $key => $worker_id) {
                    $user=User::findOrFail($worker_id);
                    $proyect->workers()->attach($user); 
                }
            }
            $proyect->update($request->all());
            return redirect()->route('proyects.list')->with('success', 'Proyecto editado correctamente');
        }else{
            //Si no, Crea un Proyect
            $proyect =Proyect::create($request->all());
            $worker_ids = $request->worker_id;
            if($worker_ids !=null){
                foreach ($worker_ids as $key => $worker_id) {
                    $user=User::findOrFail($worker_id);
                    $proyect->workers()->attach($user); 
                }
             }
            return redirect()->route('proyects.list')->with('success', 'Proyecto Agregado correctamente');
        }
    }

    public function delete($proyect_id)
    {
        $proyect = Proyect::findOrFail($proyect_id);
        $proyect->enabled=0;
        $proyect->save();
        return redirect()->route('proyects.list')->with('success', 'Proyecto eliminado correctamente');
    }

    public function assign()
    {
        
        $proyects = Proyect::where('user_id','=',Auth::user()->id)->get();
        foreach ($proyects as $key => $proyect) {
            $proyect -> client;
            $proyect -> user;
        }
            return view('proyects.assign', compact('proyects'));
    }

    public function assignitems($proyect_id)
    {
       //busca proyecto en base a su id
        $proyect = Proyect::findOrFail($proyect_id);
        
        //busca los items del proyecto
        $items = Item::where('proyect_id','=',$proyect->id)->get(); 

        return view('proyects.itemsproyect', compact('proyect','items'));
    }
}