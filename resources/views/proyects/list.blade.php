@extends('templates.main')
@section('content')
<style>
    #tabla_filter,#tabla_paginate{
        text-align: right;
    }
</style>

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista de Proyectos</h1>
            <a  href="{{ url('/') }}/proyects/add" class="btn btn-success">
                <i class="material-icons">add</i>
                Agregar Proyectos
            </a>
        </div>
        <table id="tabla" class="table table-striped  table-sm" style="width:100%" >
            <thead>
                <tr>
                    <th>Numero de Proyecto</th>
                    <th>Cliente</th>
                    <th>Nombre de Proyecto</th>
                    <th>Fecha de Inicio Programada</th>
                    <th>Fecha de Termino Programada</th>
                    <th>Fecha de Inicio Real</th>
                    <th>Fecha de Termino Real</th>
                    <th>Supervisor</th>
                    <th>Contacto de Terreno</th>
                    <th>Estado</th>
                    <th>Trabajadores</th>
                    <th>Items</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/fc-3.2.5/fh-3.1.4/sc-2.0.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                responsive: true,
                "data": {!! json_encode($proyects->toArray()) !!},
                "columns": [
                    { "data": "id","width":"5%"},
                    { "data": "client.name","width":"5%"},
                    { "data": "name","width":"5%"},
                    { "data": "entrytime","width":"5%"},
                    { "data": "departuretime","width":"5%"},
                    { "data": "startdate","width":"5%"},
                    { "data": "finishdate","width":"5%"},
                    { "data": "user.name","width":"5%"},
                    { "data": "contact","width":"5%"},
                    { "data": "statusproyect","width":"5%"},
                    { "data": "user.name","width":"5%"},
                    { "data": "item.name","width":"5%"},
                    { data: "id", render : function ( data, type, row, meta ) {
                        return '<a class="btn btn-light material-icons" href="{{ url("/")}}/proyects/'+data+'" >description</a>';
                    },"width":"1%"},
                ],
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina &nbsp;&nbsp;&nbsp;",
                    "zeroRecords": "No se encuentra ningun registro",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(buscando entre _MAX_ registros)",
                    "search":         "Filtrar Registros : &nbsp",
                    "processing" : "Cargando...",
                    paginate: {
                        first:      "Primera Pagina",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Ultima"
                    },
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@stop