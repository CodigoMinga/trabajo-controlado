@extends('templates.main')
@section('content')
<div class="container pt-3">
<h1>
    @if ($advance->id)
        <i class="material-icons">edit</i>Editar Avance
    @else
        <i class="material-icons">add_box</i>Agregar Avance
    @endif
</h1>
        <form class="col-10 pl-2" method="post" action="{{url('/advances/process')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $advance->id }}">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$advance->name}}" required>
            </div>
            <div class="form-group">
                <label>Personas</label>
                <input type="text" class="form-control" name="people"  value="{{$advance->people}}" >
            </div>
            <div class="form-group">
                <label>Horas Trabajadas</label>
                <input type="text" class="form-control" name="workedh"  value="{{$advance->workedh}}" >
            </div>
            <div class="form-group">
                <label>Porcentaje</label>
                <input type="range" class="form-control" id="porcentaje" name="percentage" min="0%" max="100%" value="{{$advance->percentage}}" >
                <span id="porc">0</span>
            </div>
            <div class="form-group">
                <label>Comentario</label>
                <input type="text" class="form-control" name="coment"  value="{{$advance->coment}}" >
            </div>
            <div class="form-group">
                <label for="task_id">Tarea:</label>
                <select name="task_id" id="task_id" class="form-control" required>
                    @foreach ($tasks as $task)
                        <option value="{{$task->id}}" {{$task->id==$advance->task_id ? "selected" : ""}}>{{$task->title}}</option>
                    @endforeach   
                </select>
            </div>
            <br>
            <div class="d-flex  justify-content-between">
              <button type="submit" class="btn btn-success ">
                  <i class="material-icons">done</i>
                  Guardar
              </button>
            @if ($advance->id)
                <a  href="{{ url('/') }}/advances/{{$advance->id}}/delete" class="btn btn-danger">
                    <i class="material-icons">clear</i>
                    Eliminar
                </a>
            @endif
            </div>
        </form>

    </div>
    <script>
        addEventListener('load',inicio,false);
      
        function inicio()
        {
          document.getElementById('porcentaje').addEventListener('mousemove',cambioTemperatura,false);
        }
      
        function cambioTemperatura()
        {    
          document.getElementById('porc').innerHTML=document.getElementById('porcentaje').value;
        }
      </script>
@stop