@extends('templates.main')
@section('content')
    
        <form class="col-10 pl-2" method="post" action="{{url('/tasks/process')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Tarea</label>
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
                <input type="text" class="form-control" name="persentage"  value="{{$task->persentage}}" >
            </div>
            <div class="form-group">
                <label>Estado</label>
                <input type="text" class="form-control" name="status"  value="{{$task->status}}" >
            </div>
            <br>
            <div class="d-flex  justify-content-between">
              <button type="submit" class="btn btn-success ">
                  <i class="material-icons">done</i>
                  Guardar
              </button>

                <a  href="{{ url('/') }}/tasks/{{$task->id}}/delete" class="btn btn-danger">
                    <i class="material-icons">clear</i>
                    Eliminar
                </a>
            </div>
        </form>

    </div>
@stop