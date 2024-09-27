

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
            </div>
                <div class="card">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-plus"></i>
                            Crear Seguimiento Intersectorial del Caso de tipo:
                            </h3>
                        </div>
                        <div class="card-body">
                        <a class="btn btn-info toastsDefaultInfo bg-blue" href="{{url('/salud/'. $informacion[0]->id_informacion.'/create')}}">Salud</a>
                        <a class="btn btn-warning toastsDefaultWarning" href="{{url('/justicia/'. $informacion[0]->id_informacion.'/create')}}">Justicia</a>
                        <a class="btn btn-danger toastsDefaultWarning" href="{{url('/proteccion/'. $informacion[0]->id_informacion.'/create')}}">Protección</a>
                        <a class="btn btn-danger toastsDefaultDanger" style="float: right;" href="{{url('/informacion/'. $informacion[0]->id_identificacion.'/index')}}">Regresar</a>
                        </div>
                    </div>

                    <div class="timeline">

                        <div class="time-label">
                            <span class="bg-info">Instituto Departamental de Salud</span>
                        </div>


                        <div>
                            <i class="fas fa-heart bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a style="color:#007BFF">Salud</a></h3>
                                <div class="timeline-body">
                                    @foreach ($salud as $sal)
                                        <li><b>Profilaxis VIH -></b> {{ $sal->pro_vih}}</li>
                                        <li><b>Profilaxis Hepatitis B -></b> {{ $sal->pro_hepa}}</li>
                                        <li><b>Otras Profilaxis -></b> {{ $sal->pro_otras}}</li>
                                        <li><b>Anticoncepción de Emergencia -></b> {{ $sal->anticoncepcion}}</li>
                                        <li><b>Orientación IVE -></b> {{ $sal->orientacion}}</li>
                                        <li><b>Salud Mendal -></b> {{ $sal->salud_mental}}</li>
                                        <li><b>Remisión a Protección -></b> {{ $sal->remision}}</li>
                                        <li><b>Informe a Autoridades / Denuncia a Policía Judicial, Fiscalía, Policía Nacional -></b> {{ $sal->informe}}</li>
                                        <li><b>Observaciones -></b> {{ $sal->observaciones}}</li>
                                        <li><b>Evidencia -></b> {{ $sal->evidencia}}
                                            <?php if($sal->evidencia) : ?>
                                                <a class="fas fa-eye" style="color:black" target="_blank" href="{{asset('Archivos/'.$sal->evidencia)}}" enctype="multipart/form-data"></a>
                                            <?php else: ?>
                                                Sin evidencia
                                            <?php endif; ?>
                                        </li>
                                        <br>
                                        <!-- <hr/>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-sm" onclick="return confirm ('¿Borrar?');" href="{{url('/salud/'. $sal->id_salud.'/destroy')}}">Borrar</a>
                                        </div> -->
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>

                        <div>
                            <i class="fas fa-balance-scale bg-warning"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a style="color:#FFC107">Justicia</a></h3>
                                <div class="timeline-body">
                                    @foreach ($justicia as $just)
                                        <li><b>Conocimiento del Caso Por Noticia Criminal-></b> {{ $just->conocimiento}}</li>
                                        <li><b>Estado de la Investigación -></b> {{ $just->estado}}</li>
                                        <li><b>Captura del Agresor -></b> {{ $just->camputa}}</li>
                                        <li><b>Activación de Ruta (Remisión) -></b> {{ $just->activacion}}</li>
                                        <li><b>Protección a Víctima en Proceso Penal -></b> {{ $just->proteccion}}</li>
                                        <li><b>Caso en Situación de Flagrancia -></b> {{ $just->caso_sit}}</li>
                                        <li><b>Responsable de Cadena de Custodia -></b> {{ $just->responsable}}</li>
                                        <li><b>Informe de Evaluación Médico Legal por Medicina Legal -></b> {{ $just->informe}}</li>
                                        <li><b>Observaciones -></b> {{ $just->observaciones}}</li>
                                        <li><b>Evidencia -></b> {{ $just->evidencia}}
                                            <?php if($just->evidencia) : ?>
                                                <a class="fas fa-eye" style="color:black" target="_blank" href="{{asset('Archivos/'.$just->evidencia)}}" enctype="multipart/form-data"></a>
                                            <?php else: ?>
                                                Sin evidencia
                                            <?php endif; ?>
                                        </li>
                                        <br>
                                        <hr/>
                                        <br>
                                        <!-- <hr/> -->
                                        <!-- <div class="timeline-footer">
                                            <a class="btn btn-warning btn-sm" onclick="return confirm ('¿Borrar?');" href="{{url('/justicia/'. $just->id_justicia.'/destroy')}}">Borrar</a>
                                        </div> -->
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div>
                            <i class="fas fa-ban bg-red"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a style="color:#DC3545">Protección</a></h3>
                                <div class="timeline-body">
                                    @foreach ($proteccion as $prot)
                                        <li><b>Adoptó Medidas de Protección en el Contexto Familiar-></b> {{ $prot->adopto}}</li>
                                        <li><b>Medida Adoptada -></b> {{ $prot->medida}}</li>
                                        <li><b>Formulación de Denuncia Penal -></b> {{ $prot->formulacion}}</li>
                                        <li><b>Observaciones -></b> {{ $prot->observaciones}}</li>
                                        <li><b>Evidencia -></b> {{ $prot->evidencia}}
                                            <?php if($prot->evidencia) : ?>
                                                <a class="fas fa-eye" style="color:black" target="_blank" href="{{asset('Archivos/'.$prot->evidencia)}}" enctype="multipart/form-data"></a>
                                            <?php else: ?>
                                                Sin evidencia
                                            <?php endif; ?>
                                        </li>
                                        <br>
                                        <hr/>
                                        <br>
                                        <!-- <hr/>
                                        <div class="timeline-footer">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm ('¿Borrar?');" href="{{url('/proteccion/'. $prot->id_proteccion.'/destroy')}}">Borrar</a>
                                        </div> -->
                                    @endforeach
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
