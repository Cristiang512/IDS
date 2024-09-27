

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
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Víctima / Sobreviviente:</h5>
                {{$identificacion[0]->nombre}} {{' '}} {{$identificacion[0]->apellidos}} con {{$identificacion[0]->tipo}} No. {{$identificacion[0]->doc_numero}}.
            </div>
                <div class="card">
                    <?php if(auth()->user()->rol_id == 1): ?>
                        <div class="card-header">
                            <a href="{{url('/informacion/'. $identificacion[0]->id_identificacion.'/create')}}" class="btn btn-success">Agregar Información del Caso</a>
                            <a href="{{url('identificacion')}}" class="btn btn-danger toastsDefaultDanger" style="float: right;">Regresar</a>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center"> <strong>Información del Caso</strong> </p>
                                <div class="chart">
                                    <table class="table table-light" id="identificacion">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo Violencia</th>
                                                <th>Mecanismo Utilizado para la Agresión</th>
                                                <th>Escenario</th>
                                                <th>Fecha del Hecho</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($informacion as $informacion)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="text-left">{{$informacion->violencia}}</td>
                                                    <td class="text-left">{{$informacion->mecanismo}}</td>
                                                    <td class="text-left">{{$informacion->escenario}}</td>
                                                    <td class="text-left">{{$informacion->fecha_hecho}}</td>
                                                    <td class="project-actions text-center">
                                                    <?php if(auth()->user()->rol_id != 1): ?>
                                                        <a class="btn btn-info btn-sm" href="{{url('/informacion/'. $informacion->id_informacion.'/ver')}}">
                                                            <i class="fas fa-eye">
                                                            </i>
                                                            <!-- Editar -->
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="{{url('/seguimiento/'. $informacion->id_informacion.'/seguimiento')}}">
                                                            <i class="fas fa-file-import"></i>    
                                                            Seguimiento Intersectorial
                                                        </a>
                                                    <?php else: ?>

                                                        <a class="btn btn-info btn-sm" href="{{url('/informacion/'. $informacion->id_informacion.'/edit')}}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            <!-- Editar -->
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="{{url('/salud/'. $informacion->id_informacion.'/index')}}">
                                                            <i class="fas fa-file-import"></i>    
                                                            Seguimiento Intersectorial
                                                        </a>
                                                        
                                                        <a class="btn btn-danger btn-sm" type="submit" onclick="return confirm ('¿Borrar?');" href="{{url('/informacion/'. $informacion->id_informacion.'/destroy')}}">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            <form method="post" action="{{url('/informacion/'. $informacion->id_informacion)}}">
                                                                {{csrf_field()}}
                                                                {{ method_field('DELETE')}}
                                                            </form>
                                                        </a>
                                                    <?php endif; ?>
                                                        
                                                        
                                                        <!-- <a class="btn-sm">
                                                            <form method="post" action="{{url('/informacion/'. $informacion->id_informacion)}}">
                                                                {{csrf_field()}}
                                                                {{ method_field('DELETE')}}
                                                                <button class="btn btn-danger btn-sm" onclick="return confirm ('¿Borrar?');">
                                                                <i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </a> -->
                                                        
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
