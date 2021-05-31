<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\User;
use App\Client;
use App\Item;
use App\Task;
use App\Advance;
use Auth;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    public function list(){

        //Array de los clientes del Usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
        
        //Tipos de Proyectos que pertenecesn a los clientes del Usuario
        $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

        //Tipos de Items que pertenecesn a los Proyectos del cliente
        $items_id    = Item::whereIn('proyect_id',$proyects_id)->pluck('id')->toArray();
        
        //Tipos de Items que pertenecesn a los Proyectos del cliente
        $tasks_id    = Task::whereIn('item_id',$items_id)->pluck('id')->toArray();

        //Tareas que pertenecesn a los items de proyetos de los clientes del Usuario
        $advances = Advance::whereIn('task_id',$tasks_id)->get();
        
        foreach ($advances as $key => $advance) {
            $advance->task;
        }
        
        return view('advances.list',compact('advances'));
    }

public function add(){
    //Array de los clientes del Usuario
    $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

    //Tipos de proyectos que pertenecesn a las clientes del Usuario
    $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

    //Tipos de Items que pertenecesn a las proyecto del Usuario
    $items_id    = Item::whereIn('proyect_id',$proyects_id)->pluck('id')->toArray();

    $tasks = Task::whereIn('item_id',$items_id)->get();

    $advance = new Advance();
    return view('advances.form',compact('advance','tasks'));
}

public function details($advance_id){
    //Array de los clientes del Usuario
    $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
    
    //Tipos de Proyectos que pertenecesn a los clientes del Usuario
    $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

   //Tipos de Items que pertenecesn a los Proyectos del cliente
   $items_id    = Item::whereIn('proyect_id',$proyects_id)->pluck('id')->toArray();
  
   $tasks_id    = Task::whereIn('item_id',$items_id)->pluck('id')->toArray();

    $advance = Advance::find($advance_id);
    return view('advances.form',compact('tasks','advance'));
}

public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $advance = Advance::findOrFail($request->id);
            $advance->update($request->all());
            return redirect()->route('advances.list')->with('success', 'Avance editado correctamente');
        }else{
            //Si no, Crea una tarea
            Advance::create($request->all());
            return redirect()->route('advances.list')->with('success', 'Avance Agregado correctamente');
        }
    }

    public function delete($advance_id)
    {
        $advance = Advance::findOrFail($advance_id);
        $advance->delete();
        return redirect()->route('advances.list')->with('success', 'Avance eliminado correctamente');
    }
}
