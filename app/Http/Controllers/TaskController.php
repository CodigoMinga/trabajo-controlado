<?php

namespace App\Http\Controllers;
use App\Item;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function list(){
    $items = Item::all();
    return view('tasks.list',compact('task'));
}

public function add(){
    $task = new Task();
    $items = Item::all();
    return view('tasks.form',compact('task','items'));
}

}
