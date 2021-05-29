<?php

namespace App\Http\Controllers;
use App\Proyect;
use App\User;
use App\Client;
use App\Item;
use Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list(){
        //Array de los clientes del Usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
        
        //Tipos de Proyectos que pertenecesn a los clientes del Usuario
        $proyects_id    = Proyect::whereIn('client_id',$clients_id)->pluck('id')->toArray();

        //items que pertenecesn a los proyectos de los clientes del Usuario
        $items = Item::whereIn('ptoyect_id',$proyects_id)->get();
        
        foreach ($items as $key => $item) {
            $item->proyect;
        }
        return view('items.list',compact('items'));
    }

    public function add(){
         //Array de los clientes del Usuario
         $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();
        
         //Tipos de Proyectos que pertenecesn a las clientes del Usuario
        $proyects = Proyect::whereIn('client_id',$clients_id)->get();
        
        $item = new Item;
        return view('proyects.form',compact('item','proyects'));
    }
   
    public function details($item_id){
        //Array de los clientes del Usuario
        $clients_id = Auth::user()->clients()->pluck('client_id')->toArray();

        //Tipos de Proyectos que pertenecesn a las clientes del Usuario
        $proyects = Proyect::whereIn('client_id',$clients_id)->get();


        $item = Item::find($item_id);
        return view('items.form',compact('item','proyects'));
    }

    public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $item = Item::findOrFail($request->id);
            $item->update($request->all());
            return redirect()->route('items.list')->with('success', 'Item editado correctamente');
        }else{
            //Si no, Crea un Item
            Item::create($request->all());
            return redirect()->route('items.list')->with('success', 'Item Agregado correctamente');
        }
    }

    public function delete($item_id)
    {
        $item = Item::findOrFail($item_id);
        $item->delete();
        return redirect()->route('items.list')->with('success', 'Item eliminado correctamente');
    }
}
