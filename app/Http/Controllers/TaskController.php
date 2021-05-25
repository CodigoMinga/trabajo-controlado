<?php

namespace App\Http\Controllers;
use App\Item;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function list(){
    $tasks = Task::all();
    return view('tasks.list',compact('tasks'));
}

public function add(){
    $task = new Task();
    $items = Item::all();
    return view('tasks.form',compact('task','items'));
}

public function details($task_id){
    $task = Task::findOrFail($task_id);
    return view('tasks.form',compact('task'));
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
            //Si no, Crea un Item
            Task::create($request->all());
            return redirect()->route('tasks.list')->with('success', 'Tarea Agregada correctamente');
        }
    }

    public function delete($task_id)
    {
        $task = Task::findOrFail($task_id);
        $task->delete();
        return redirect()->route('tasks.list')->with('success', 'Tarea eliminada correctamente');
    }
}
