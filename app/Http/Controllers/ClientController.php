<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function add(){
       $users=User::all();
       return view('clients.add',compact('users'));
   }
   public function addProcess(Request $request){

    Client::create($request->all());
    return redirect()->route('clients.list')->with('success', 'Cliente Creado correctamente');
}
   public function list(){
       $clients = Client::all();
       return view ('clients.list' ,compact('clients'));
   }
   public function details($client_id){
    return view('clients.details', [
        'client' => Client::find($client_id)
    ]);
   }


   public function editprocess($client_id, Request $request)
   {
       //busca la orden en la base de datos con el id que se le pasa desde la URL
       $client = Client::findOrFail($client_id);
   
       $client->update($request->all());
   
       return redirect()->route('clients.list')->with('success', 'Cliente editado correctamente');
   }
   public function delete($client_id)
   {
       $client = client::findOrFail($client_id);
       $client->delete();
       return redirect()->route('clients.list')->with('success', 'Cliente eliminado correctamente');
   }
}
