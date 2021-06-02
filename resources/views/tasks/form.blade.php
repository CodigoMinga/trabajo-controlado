@extends('templates.main')
@section('content')
<h1>
    @if ($task->id)
        <i class="material-icons">edit</i>Editar Tarea
    @else
        <i class="material-icons">add_box</i>Agregar Tarea
    @endif
</h1>
        <form class="col-10 pl-2" method="post" action="{{url('/tasks/process')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $task->id }}">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" name="title" value="{{$task->title}}" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{$task->description}}" required>
            </div>
            <div class="form-group">
                <label>Hora de inicio</label>
                <input type="time" class="form-control" name="entrytime"  value="{{$task->entrytime}}" >
            </div>
            <div class="form-group">
                <label>Porcentaje</label>
                <input type="text" class="form-control" name="percentage"  value="{{$task->percentage}}" >
            </div>
            
            <div class="form-group">
                <label for="item_id">Items:</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    @foreach ($items as $item)
                        <option value="{{$item->id}}" {{$item->id==$task->item_id ? "selected" : ""}}>{{$item->name}}</option>
                    @endforeach   
                </select>
            </div><br>
            <div class="form-group">
                <label>Estado</label>
                <select name="status" id="status">
                    <option value="0">Pendiente</option>
                    <option value="1">Ejecución</option>
                    <option value="2">Terminada</option>
                    <option value="3">Anulada</option>
               </select>
            </div><br>
            <div class="d-flex  justify-content-between">
              <button type="submit" class="btn btn-success ">
                  <i class="material-icons">done</i>
                  Guardar
              </button>
            @if ($task->id)
                <a  href="{{ url('/') }}/tasks/{{$task->id}}/delete" class="btn btn-danger">
                    <i class="material-icons">clear</i>
                    Eliminar
                </a>
            @endif
            </div>
        </form>

    </div>
@stop