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
            <br>
            @if($proyect->id)
            <select name="statusproyect" id="statusproyect">
                <option value="Pendiente">Pendiente</option>
                <option value="Ejecución">Ejecución</option>
                <option value="Terminada">Terminada</option>
                <option value="Anulada">Anulada</option>
           </select>
            @endif
            <br>
            <br>
            <div class="form-group">
                <label for="worker_id">Trabajadores:</label>
                <select id="worker_id" class="form-control" >
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{$user->id==$proyect->user_id ? "selected" : ""}}>{{$user->name}}</option>
                    @endforeach   
                </select>

            </div>
            <br>
            <a id="btn_agregar" onclick="addWorker()" class="btn btn-dark">
                Agregar
            </a>
            <br><br>

            <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th scope="col">Trabajador</th>
                    <th scope="col">Eliminar</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr id="tr">
                    <td id="td"></td>
                    <td ></td>
         
                  </tr>

                </tbody>
            </table>

          
        <br>
        @if ($proyect->id)
        <div class="form-group">
            <label for="item_id">Item:</label>
            <select id="item_id" class="form-control" >
                @foreach ($items as $item)
                    <option value="{{$item->id}}" {{$item->id==$proyect->item_id ? "selected" : ""}}>{{$item->name}}</option>
                @endforeach   
            </select>

        </div>
        @endif
        <br>
        <div class="d-flex  justify-content-between">
            <button type="submit" class="btn btn-success">
                <i class="material-icons">send</i>
                Guardar
            </button>
            @if ($proyect->id)
            <a href="{{ url('/items/add')}}" class="btn btn-dark">
                <i class="material-icons">category</i>
                Agregar Items
            </a>
            <a href="{{ url('/proyects') }}/{{ $proyect->id }}/delete" class="btn btn-danger">
                <i class="material-icons">close</i>
                Eliminar
            </a>

            @endif
        </div>
        <br>

    </form>
    <br>
   

</div>

<script>
    var addworker = document.getElementById("worker_id");
    var table = document.getElementById("table");
    var btnAgregar = document.getElementById("button");
    function addWorker(){
        var ntr = document.createElement('tr');
        var ntd = document.createElement('td');
        var ntd1 = document.createElement('td');
        var id=worker_id.value;
        ntd=worker_id.options[worker_id.selectedIndex].text;
        var input=document.createElement('input');
        var btneliminar = document.createElement("btndelet");
        btneliminar.innerText="Eliminar";
        btneliminar.onclick=function(){
            this.parentElement.remove();

        }
        ntd1.append(btneliminar)
        ntr.append(ntd);
        ntr.append(ntd1);
        input.type="hidden";
        input.value=id;
        input.name="worker_id[]";
        ntd.innerHTML=texto;
        ntd.append(input);
        table.append(ntr);
      
        

    }



</script>

@stop