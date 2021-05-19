@extends('templates.main')
@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">library_books</i>Detalles
    </h1>
    <form method="post" action="{{url('/clients/'.$client->id.'/edit/process')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Nombre Cliente</label>
            <input required type="text" class="form-control" name="name" value="{{$client->name}}">
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" name="phone"  value="{{$client->phone}}">
        </div>
        <div class="form-group">
            <label>Direccíon</label>
            <input type="text" class="form-control" name="address"  value="{{$client->address}}">
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input type="text" class="form-control" name="mail"  value="{{$client->email}}">
        </div>
        <br>
        <button type="submit" class="btn btn-success ">
            <i class="material-icons">done</i>
            Editar Usuario
        </button>
        <a  href="{{ url('/') }}/clients/{{$client->id}}/delete" class="btn btn-danger">
            <i class="material-icons">clear</i>
            Eliminar Usuario
        </a>
    </form>

</div>
@stop