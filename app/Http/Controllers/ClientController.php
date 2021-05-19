<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function add(){

       return('clients.add');
   }
   public function addProcess(request $request){
       Client::create($request->all);
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
}
