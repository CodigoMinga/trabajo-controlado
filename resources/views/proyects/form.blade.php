@extends('templates.main')
@section('content')
<div class="container pt-3">
    <h1>
        @if ($proyect->id)
            <i class="material-icons">edit</i>Editar Proyecto
        @else
            <i class="material-icons">add_box</i>Agregar Proyecto
        @endif
    </h1>
    <form method="post" action="{{url('proyects/process')}}" id="form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $proyect->id }}">
        <div class="form-group">
            <label for="client_id">Cliente:</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{$client->id}}" {{$client->id==$proyect->client_id ? "selected" : ""}}>{{$client->name}}</option>
                @endforeach   
            </select>
        </div>
        <div class="form-group">
            <label>Nombre de Proyecto</label>
            <input type="text" class="form-control" placeholder="" name="name" value="{{$proyect->name}}" required>
        </div>
        <div class="form-group">
            <label>Fecha de Inicio Programada</label>
            <input type="date" class="form-control" placeholder="" name="entrytime" value="{{$proyect->entrytime}}" required>
        </div>
        <div class="form-group">
            <label>Fecha de Termino Programada</label>
            <input type="date" class="form-control" placeholder="" name="departuretime" value="{{$proyect->departuretime}}" required>
        </div>
        @if($proyect->id)
        
        <div class="form-group">
            <label>Fecha de Inicio Real</label>
            <input type="date" class="form-control" placeholder="" name="startdate" value="{{$proyect->startdate}}" >
        </div>
        <div class="form-group">
            <label>Fecha de Termino Real</label>
            <input type="date" class="form-control" placeholder="" name="finishdate" value="{{$proyect->finishdate}}">
        </div>
        @endif
            <div class="form-group">
            <label for="user_id">Supervisor:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{$user->id}}" {{$user->id==$proyect->user_id ? "selected" : ""}}>{{$user->name}}</option>
                @endforeach   
            </select>
            </div>

            <div class="form-group">
            <label>Contacto Terreno</label>
            <input type="text" class="form-control" placeholder="" name="contact" value="{{$proyect->contact}}" required>
            </div>
            @if($proyect->id)
            <select name="statusproyect" id="statusproyect">
                <option value="Pendiente">Pendiente</option>
                <option value="Ejecución">Ejecución</option>
                <option value="Terminada">Terminada</option>
                <option value="Anulada">Anulada</option>
           </select>
            @endif
            <div class="form-group">
                <label for="user_id">Trabajadores:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{$user->id==$proyect->user_id ? "selected" : ""}}>{{$user->name}}</option>
                    @endforeach   
                </select>
            </div>
            <div class="form-group">
                <label for="item_id">Items:</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    @foreach ($items as $item)
                        <option value="{{$item->id}}" {{$item->id==$proyect->item_id ? "selected" : ""}}>{{$item->name}}</option>
                    @endforeach   
                </select>
            </div>
        <br>
        <div class="d-flex  justify-content-between">
            <button type="submit" class="btn btn-success">
                <i class="material-icons">send</i>
                Guardar
            </button>
            @if ($proyect->id)
            <a href="{{ url('/proyects') }}/{{ $proyect->id }}/delete" class="btn btn-danger">
                <i class="material-icons">close</i>
                Eliminar
            </a>
            @endif
        </div>
    </form>
</div>
@stop