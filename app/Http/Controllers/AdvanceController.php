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


    public function addimage($advance_id){
        $advancess = Advances::all();
        return view('advances.addimage', compact('advance_id'));
    }
    public function list(){

        $advances = Advance::all();
        
        return view('advances.list',compact('advances'));
    }

public function add(){
    //Array de los clientes del Usuario
    $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

    //Tipos de proyectos que pertenecesn a las clientes del Usuario
    $proyects_id = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

    //Tipos de Items que pertenecesn a las proyecto del Usuario
    $items_id    = Item::whereIn('proyect_id',$proyects_id)->pluck('id')->toArray();

    $tasks = Task::whereIn('item_id',$items_id)->get();

    $advance = new Advance();
    return view('advances.form',compact('advance','tasks'));
}

public function details($advance_id)
{
    $tasks = Task::all();
    $advance = Advance::find($advance_id);
 
    return view('advances.form',compact('advance','tasks'));
}

public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $advance = Advance::findOrFail($request->id);
            $advance->image = $request->file('image')->store('images');
            $advance->update($request->all());
            return redirect()->route('advances.list')->with('success', 'Avance editado correctamente');
        }else{
            //Si no, Crea una tarea
            $advance = new Advance($request->all());
            $advance->image = $request->file('image')->store('images');
            $advance->save();
            return redirect()->route('advances.list')->with('success', 'Avance Agregado correctamente');
        }
    }

    public function delete($advance_id)
    {
        $advance = Advance::findOrFail($advance_id);
        $advance->enabled=0;
        $advance->save();
        return redirect()->route('advances.list')->with('success', 'Avance eliminado correctamente');
    }
}
