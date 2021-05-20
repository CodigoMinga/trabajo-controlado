@extends('templates.main')
@section('content')
<div class="container pt-3">
    <h1>
        <i class="material-icons">add_box</i>Agregar
    </h1>
    <form method="post" action="{{url('/clients/add/process')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Nombre:</label>
      <input type="text" class="form-control" placeholder="Nombre Empresa" name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Rut:</label>
      <input type="text" class="form-control" placeholder="Rut de Empresa" name="rut" id="rut" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Teléfono</label>
      <input type="text" class="form-control" placeholder="Telefono" name="phone" id="phone" required>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2" class="form-label">Correo</label>
        <input type="text" class="form-control"  placeholder="ingrese email" name="email" id="emaill" required>
      </div>
      
    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Representante</label>
      <input type="text" class="form-control"  placeholder="Nombre del Representante" name="representative" id="representative" required>
    </div>
    <div class="form-group">
      <label for="client">Estado:</label>
      <select name="statusclient" id="statusclient" class="form-control" >
            <option value="1">Habilitado</option>
            <option value="0">Desabilitado</option>
      </select>
    </div>

    <br>
    <button type="submit" class="btn btn-success btn-lg btn-block">
        <i class="material-icons">done</i>
        Guardar
    </button>

    </form>
  </div>
 
@stop