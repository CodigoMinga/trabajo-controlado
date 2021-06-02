@extends('templates.main')
@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">library_books</i>Detalles
    </h1>
    <form method="post" action="{{url('/clients/'.$client->id.'/edit/process')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Nombre Empresa</label>
            <input required type="text" class="form-control" name="name" value="{{$client->name}}">
        </div>
        <div class="form-group">
            <label>Rut Empresa</label>
            <input required type="text" class="form-control" name="rut" value="{{$client->rut}}">
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" name="phone"  value="{{$client->phone}}">
        </div>

        <div class="form-group">
            <label>Correo</label>
            <input type="text" class="form-control" name="mail"  value="{{$client->email}}">
        </div>
        <div class="form-group">
            <label>Representante</label>
            <input type="text" class="form-control" name="representative"  value="{{$client->representative}}">
        </div>
        <div class="form-group">
            <label for="client">Estado:</label>
            <select name="statusclient" id="statusclient" class="form-control" value="{{$client->statusclient}}" >
                  <option value="Habilitado">Habilitado</option>
                  <option value="Desabilitado">Desabilitado</option>
            </select>
          </div>
        <button type="submit" class="btn btn-success ">
            <i class="material-icons">done</i>
            Editar Cliente
        </button>
        <a  href="{{ url('/') }}/clients/{{$client->id}}/delete" class="btn btn-danger">
            <i class="material-icons">clear</i>
            Eliminar Cliente
        </a>
    </form>

</div>
@stop