@extends('templates.main')
@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">add_box</i>Agregar
    </h1>
    <form method="post" action="{{url('/clients/add/process')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Cliente</label>
      <input type="text" class="form-control" placeholder="Nombre Cliente" name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Teléfono</label>
      <input type="text" class="form-control" placeholder="Telefono" name="phone" id="phone" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Dirección</label>
      <input type="text" class="form-control"  placeholder="direccion" name="address" id="address" required>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2" class="form-label">Correo</label>
        <input type="text" class="form-control"  placeholder="ingrese email" name="email" id="emaill" required>
      </div>


    <br>
    <button type="submit" class="btn btn-success btn-lg btn-block">
        <i class="material-icons">done</i>
        Guardar
    </button>

    </form>
  </div>
 
@stop