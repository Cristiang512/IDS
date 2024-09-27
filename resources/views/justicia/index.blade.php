

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
            @if (count($errors)>0)
            <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>
                  {{ $error}}
                  </li>
                  @endforeach
              </ul>
            </div>
          @endif
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Información Del Caso:</h5>
                    <li><b>Tipo de violencia -></b> {{ $informacion[0]->violencia}}</li>
                    <li><b>Mecanismo Utilizado para la Agresión -></b> {{ $informacion[0]->mecanismo}}</li>
                    <li><b>Escenario -></b> {{ $informacion[0]->escenario}}</li>
                    <li><b>Fecha del Hecho -></b> {{ $informacion[0]->fecha_hecho}}</li>
                    {{$informacion}}
                    {{$salud}}
            </div>
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-app bg-danger" href="javascript:history.back(-1);" style="float: right;" >
                            <span class="badge bg-danger"></span>
                            <i class="fas fa-long-arrow-alt-left"></i> Regresar
                        </a>
                        <a class="btn btn-app bg-blue" href="{{url('/salud/'. $informacion[0]->id_informacion.'/create')}}" >
                            <span class="badge bg-danger"></span>
                            <i class="fas fa-heart"></i> Salud
                        </a>
                        <a class="btn btn-app bg-warning" href="{{url('/justicia/'. $informacion[0]->id_informacion.'/create')}}">
                            <span class="badge bg-info"></span>
                            <i class="fas fa-balance-scale"></i> Justicia
                        </a>
                        <a class="btn btn-app bg-danger" href="{{url('/proteccion/'. $informacion[0]->id_informacion.'/create')}}">
                            <span class="badge bg-teal"></span>
                            <i class="fas fa-ban"></i> Protección
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center"> <strong>Seguimiento Intersectorial del Caso</strong> </p>
                                <div class="chart">
                                    <table class="table table-light" id="identificacion">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo Violencia</th>
                                                <th>Mecanismo Utilizado para la Agresión</th>
                                                <th>Escenario</th>
                                                <!-- <th>Ámbito de la Violencia Según Lugar de Ocurrencia</th> -->
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
                                                    <!-- <td class="text-left">{{$informacion->ambito}}</td> -->
                                                    <td class="text-left">{{$informacion->fecha_hecho}}</td>
                                                    <td class="project-actions text-center">
                                                        <a class="btn btn-info btn-sm" href="{{url('/informacion/'. $informacion->id_informacion.'/edit')}}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            <!-- Editar -->
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="{{url('/informacion/'. $informacion->id_informacion.'/index')}}">
                                                        Seguimiento Intersectorial
                                                            <i class="fas fa-file-import"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" type="submit" onclick="return confirm ('¿Borrar?');" href="{{url('/informacion/'. $informacion->id_informacion.'/destroy')}}">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            <form method="post" action="{{url('/informacion/'. $informacion->id_informacion)}}">
                                                                {{csrf_field()}}
                                                                {{ method_field('DELETE')}}
                                                            </form>
                                                        </a>
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

                    <div class="timeline">

                        <div class="time-label">
                            <span class="bg-red">Instituto Departamental de Salud</span>
                        </div>


                        <div>
                            <i class="fas fa-heart bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a style="color:#007BFF">Salud</a></h3>
                                <div class="timeline-body">
                                <li><b>Profilaxis VIH -></b> {{ $salud[0]->pro_vih}}</li>
                                <li><b>Profilaxis Hepatitis B -></b> {{ $salud[0]->pro_hepa}}</li>
                                <li><b>Otras Profilaxis -></b> {{ $salud[0]->pro_otras}}</li>
                                <li><b>Anticoncepción de Emergencia -></b> {{ $salud[0]->anticoncepcion}}</li>
                                <li><b>Orientación IVE -></b> {{ $salud[0]->orientacion}}</li>
                                <li><b>Salud Mendal -></b> {{ $salud[0]->salud_mental}}</li>
                                <li><b>Remisión a Protección -></b> {{ $salud[0]->remision}}</li>
                                <li><b>Informe a Autoridades / Denuncia a Policía Judicial, Fiscalía, Policía Nacional -></b> {{ $salud[0]->informe}}</li>
                                <li><b>Observaciones -></b> {{ $salud[0]->observaciones}}</li>
                                <li><b>Evidencia -></b> {{ $salud[0]->evidencia}}</li>
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm">Borrar</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <i class="fas fa-balance-scale bg-warning"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a style="color:#FFC107">Justicia</a></h3>
                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-warning btn-sm">Borrar</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <i class="fas fa-ban bg-red"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a style="color:#DC3545">Protección</a></h3>
                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-danger btn-sm" >Borrar</a>
                                </div>
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
