<?php

namespace App\Http\Controllers;

use App\Item;
use App\Proyect;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list(){
        $proyects = Proyect::all();
        $items = Item::all();
        return view('items.list',compact('items'));
    }

    public function add(){
        $proyects = Proyect::all();
        $item = new Item;
        return view('proyects.form',compact('item','proyects'));
    }
   
    public function details($item_id)
    {
        $proyect = Proyect::all();
        $item = Item::find($item_id);
        return view('items.form',compact('item','proyect'));
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
