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
     
    
        $items = Item::all();
        return view('items.list',compact('items'));
    }

    public function add(){
         //Array de los clientes del Usuario
        $proyects=Proyect::all();
        $item = new Item;
        return view('items.form',compact('item','proyects'));
    }
   
    public function details($item_id){
        //Array de los clientes del Usuario
        $proyects = Proyect::all();
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
        $item->enabled=0;
        $item->save();
        return redirect()->route('items.list')->with('success', 'Item eliminado correctamente');
    }
}
