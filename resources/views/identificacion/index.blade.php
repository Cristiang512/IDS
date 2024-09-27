

@extends('adminlte/layout')

@section('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
@endsection

@section('app')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
            @if(Session::has('message'))
                    <div class="alert alert-info">
                        <p>Información:</p>
                        <ul>
                        {{Session::get('message')}}
                        </ul>
                    </div>
            @endif
            @if(Session::has('errors'))
                    <div class="alert alert-danger" role="alert">
                        <p>Información:</p>
                        <ul>
                        {{Session::get('errors')}}
                        </ul>
                    </div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <a href="{{url('identificacion/create')}}" class="btn btn-success">Identificar Nueva Víctima / Sobreviviente</a>
                        <div class="card-tools">
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              {{-- style="border-right: 1px solid gray;border-left: 1px solid gray;border-top: 1px solid gray;border-bottom: 1px solid gray" --}}
                                <p class="text-center"> <strong>Identificación de Víctimas / Sobrevivientes</strong> </p>
                                <div class="chart">
                                    <table class="table table-light" id="identificacion">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">Nombres</th>
                                                <th class="text-center">Apellidos</th>
                                                <th class="text-center">Tipo Documento</th>
                                                <th class="text-center">Número</th>
                                                <th class="text-center">Municipio del Caso</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($identificacion as $identificacion)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="text-center">{{$identificacion->nombres}}</td>
                                                    <td class="text-center">{{$identificacion->apellidos}}</td>
                                                    <td class="text-center">{{$identificacion->tipo}}</td>
                                                    <td class="text-center">{{$identificacion->doc_numero}}</td>
                                                    <td class="text-center">{{$identificacion->nombre_municipio}}</td>
                                                    <td class="project-actions text-center">
                                                        <a class="btn btn-info btn-sm" href="{{url('/identificacion/'. $identificacion->id_identificacion.'/edit')}}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Editar
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="{{url('/informacion/'. $identificacion->id_identificacion.'/index')}}">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            Información del Caso
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" type="submit" onclick="return confirm ('¿Borrar?');" href="{{url('/identificacion/'. $identificacion->doc_numero.'/destroy')}}">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              <br>
                            </div>

                        </div>
                    </div>
                </div>
                    
            </div>
    </section>
</div>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script> $('#identificacion').DataTable({
        reponsive: true,
        autoWidth: false,
        "language": {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }


    }); </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
    @if (Session::has('info'))
        <script>
            toastr.success("{!! Session::get('info') !!}");
        </script>
    @endif
@endsection
