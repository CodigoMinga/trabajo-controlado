<?php

namespace App\Http\Controllers;

use App\Proyect;
use App\User;
use App\Client;
use App\Item;
use Auth;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    public function list(){
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
        $items_id = Auth::user()->items()->pluck('item_id')->toArray();
        $proyects = Proyect::whereIn('client_id',$clients_id)->get();
        return view('proyects.list',compact('proyects'));
    }

    public function add(){
        $clients = Auth::user()->clients()->get();
        $items = Auth::user()->items()->get();
        $proyect = new Proyect;
        return view('proyects.form',compact('clients','proyect','items'));
    }
   
    public function details($proyect_id)
    {
        $clients = Auth::user()->clients()->get();
        $proyect = Proyect::find($proyect_id);
        return view('proyects.form',compact('clients','proyect'));
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
            //Si no, Crea un Item
            Proyect::create($request->all());
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
}
