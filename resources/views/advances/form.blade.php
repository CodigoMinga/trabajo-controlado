@extends('templates.main')
@section('content')
<div class="container pt-3">
<h1>
    @if ($advance->id)
        <i class="material-icons">edit</i>Editar Avance
        <img src="/storage/{{$advance->image}}" alt="{{$advance->name}}">
    @else
        <i class="material-icons">add_box</i>Agregar Avance
    @endif
</h1>
        <form class="col-10 pl-2" method="post" enctype="multipart/form-data" action="{{url('/advances/process')}}">
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
                <input type="text" class="form-control"  name="porcentage" value="{{$advance->percentage}}">
                
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
        @if ($advance->id)
        <div class="container pt-3">
            <div class="box-body">
                <h2 class="page-header">
                    <i class="fa fa-pencil"></i> Registrar Fotos
                </h2>
                    <form method="POST" action="{{url('advances/'.$advance->id.'/add/images/Process')}}"  enctype="multipart/form-data">
                   
                        @csrf
        
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <input type="file" name="picture">
                            
                    </div>
                    <div>
                    <div class="form-group">
                        <label for="description">Descripción: </label>
                        <input required type="textarea" class="form-control" name="description" value="">
                    
                    </div>
                    </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Guardar</button>
                </form>
                
            </div>
            @endif

    </div>
    <br>

            
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