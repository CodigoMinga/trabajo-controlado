@extends('templates.main')
@section('content')
<div class="container pt-3">
    <h1>
        @if ($item->id)
            <i class="material-icons">edit</i>Editar Item
        @else
            <i class="material-icons">add_box</i>Agregar Item
        @endif
    </h1>
    <form method="post" action="{{url('items/process')}}" id="form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="form-group">
            <label>Descripcion</label>
            <input type="text" class="form-control" placeholder="" name="description" value="{{$item->description}}" required>
        </div>
        <div class="form-group">
            <label>Horas Hombres Programadas</label>
            <input type="date" class="form-control" placeholder="" name="hhscheduled" value="{{$item->hhscheduled}}" required>
        </div>
        <div class="form-group">
            <label>Horas Hombres Real</label>
            <input type="date" class="form-control" placeholder="" name="hhreal" value="{{$item->hhreal}}" required>
        </div>

            <div class="form-group">
            <label>Fecha de Inicio</label>
            <input type="text" class="form-control" placeholder="" name="entrytime_item" value="{{$item->entrytime_item}}" required>
            </div>

        <br>
        <div class="d-flex  justify-content-between">
            <button type="submit" class="btn btn-success">
                <i class="material-icons">send</i>
                Guardar
            </button>
            @if ($item->id)
            <a href="{{ url('/items') }}/{{ $item->id }}/delete" class="btn btn-danger">
                <i class="material-icons">close</i>
                Eliminar
            </a>
            @endif
        </div>
    </form>
</div>
@stop