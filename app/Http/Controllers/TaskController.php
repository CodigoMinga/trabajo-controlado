<?php

namespace App\Http\Controllers;
use App\Proyect;
use App\User;
use App\Client;
use App\Item;
use App\Task;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function list(){

        //Array de los clientes del Usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
        
        //Tipos de Proyectos que pertenecesn a los clientes del Usuario
        $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

        //Tipos de Items que pertenecesn a los Proyectos del cliente
        $items_id    = Item::whereIn('proyect_id',$proyects_id)->pluck('id')->toArray();

        //Tareas que pertenecesn a los items de proyetos de los clientes del Usuario
        $tasks = Task::whereIn('item_id',$items_id)->get();
        
        foreach ($tasks as $key => $task) {
            $task->item;
        }
        
        return view('tasks.list',compact('tasks'));
    }

public function add(){
    //Array de los clientes del Usuario
    $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

    //Tipos de proyectos que pertenecesn a las clientes del Usuario
    $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

    //Tipos de Items que pertenecesn a las proyecto del Usuario
    $items = Item::whereIn('proyect_id',$proyects_id)->get();

    $task = new Task();
    return view('tasks.form',compact('task','items'));
}

public function details($task_id){
    //Array de los clientes del Usuario
    $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
    
    //Tipos de Proyectos que pertenecesn a los clientes del Usuario
    $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

   //Tipos de Items que pertenecesn a los Proyectos del cliente
   $items_id    = Item::whereIn('proyect_id',$proyects_id)->pluck('id')->toArray();

    $task = Task::find($task_id);
    return view('tasks.form',compact('items','task'));
}

public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $task = Task::findOrFail($request->id);
            $task->update($request->all());
            return redirect()->route('tasks.list')->with('success', 'Tarea editada correctamente');
        }else{
            //Si no, Crea una tarea
            Task::create($request->all());
            return redirect()->route('tasks.list')->with('success', 'Tarea Agregada correctamente');
        }
    }

    public function delete($task_id)
    {
        $task = Task::findOrFail($task_id);
        $task->enabled=0;
        $task->save();
        return redirect()->route('tasks.list')->with('success', 'Tarea eliminada correctamente');
    }
}
