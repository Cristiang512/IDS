@extends('adminlte/layout')


@section('links')
    <link href="public/css/multiselect.css" media="screen" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
@endsection
@section('app')


    <div class="content-wrapper">
        
        <section class="content-header">
            <div class="row">
                <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                <div class="inner">
                <h3>{{$vs}}</h3>
                <p>Víctimas / Sobrevivientes Identificados</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                <div class="inner">
                <h3>{{$info}}</h3>
                <p>Casos Registrados</p>
                </div>
                <div class="icon">
                <i class="ion ion-folder"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$seg}}</h3>
                <p>Seguimientos Generados</p>
                </div>
                <div class="icon">
                <i class="ion ion-folder"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{$abi}}</h3>
                <p>Casos Abiertos</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
                </div>

            </div>

            


            <div class="container-fluid">
                <form action="{{url('reporte/generar')}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title" style="text-align: center"><strong>Generar Reporte Excel</strong></h1>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div role="form">
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="tipo">Tipo de Reporte</label>
                                                                <select name="tipo" id="tipo" class="form-control" required>
                                                                    <option
                                                                    value="" > Seleccione...
                                                                    </option>
                                                                    <option value="1">Casos Abiertos</option>
                                                                    <option value="2">Casos Cerrados</option>
                                                                    <option value="3">Violencia Sexual</option>
                                                                    <option value="4">Violencia No Sexual</option>  
                                                                    <option value="5">Ámbito Escolar</option>
                                                                    <option value="6">Ámbito Laboral</option>
                                                                    <option value="7">Ámbito Institucional</option>
                                                                    <option value="8">Ámbito Virtual</option> 
                                                                    <option value="9">Ámbito Comunitario</option>
                                                                    <option value="10">Ámbito Hogar</option>
                                                                    <option value="11">Otros Ámbitos</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="fecha_ini">Fecha Inicial de Hecho</label>
                                                                <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="fecha_fin">Fecha Final de Hecho</label>
                                                                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-success float-right">Descargar Reporte - Archivo Excel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title" style="text-align: center"><strong>Listado General</strong></h1>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <p class="text-center"><strong></strong></p>
                                    --}}
                                    <div class="chart">
                                        <table class="table table-light" id="historial">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Estado</th>
                                                    <th>Tipo de Violencia</th>
                                                    <th>Ámbito de Violencia</th>
                                                    <th>Fecha del Hecho</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($casos as $dat)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{ $dat->estado_referencia}}</td>
                                                        <td>{{ $dat->violencia}}</td>
                                                        <td>{{ $dat->ambito}}</td>
                                                        <td>{{ $dat->fecha_hecho}}</td>
                                                    </tr>
                                            @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                </div>
                                {{-- col-3 --}}
                            </div>
                        </div>
                    </div>
                    {{-- Segunda card --}}
                    <form action="{{url('reporte/aplicar')}}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title" style="text-align: center"><strong>Aplicar Fechas a los Gráficos Generales</strong></h1>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-expanded="true">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div role="form">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="fecha_ini">Fecha Inicial de Hecho</label>
                                                        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="fecha_fin">Fecha Final de Hecho</label>
                                                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-success float-right">Aplicar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Gráficas:</h5>
                            <?php if($ini) : ?>
                                Gráficas con fechas entre {{$ini}} y {{$fin}}
                                <a href="{{url('reporte')}}" class="btn btn-danger toastsDefaultDanger" style="float: right;" ><i class="fa fa-times"></i></a>
                            <?php else: ?>
                                Gráficas Generales 
                            <?php endif; ?>
                    </div>






                    <div>
                        <br>

                        <div id="tamaño">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <canvas id="grafico1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <canvas id="grafico2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <canvas id="grafico3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const ctx = document.getElementById('grafico1');
                                const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Acoso Sexual', 'Acoso Carnal', 'Explotación Sexual', 'Trata de Personas', 'Actos Sexuales', 'Mutilación Genital','Otras violaciones Sexuales'],
                                        datasets: [{
                                            label: 'Nº de Casos de Violencia Sexual',
                                            // data: [21, 13, 7, 23, 40, 18, 30, 10],
                                            data: [{{$as}}, {{$ac}}, {{$exp}}, {{$tra}}, {{$ac}}, {{$act}}, {{$mut}}, {{$otr}}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                                const ctx2 = document.getElementById('grafico2');
                                const myChart2 = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Física', 'Psicológica', 'Negligencia y Abandono', 'Patrimonial'],
                                        datasets: [{
                                            label: 'Nº de Casos de Violencia NO Sexual',
                                            // data: [12, 19, 3, 5],
                                            data: [{{$fis}}, {{$psi}}, {{$neg}}, {{$pat}}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                                const ctx3 = document.getElementById('grafico3');
                                const myChart3 = new Chart(ctx3, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Escolar', 'Laboral', 'Institucional', 'Virtual', 'Comunitario','Hogar', 'Otros Ámbitos'],
                                        datasets: [{
                                            label: 'Nº de Casos por Ámbito de Violencia',
                                            // data: [12, 19, 3, 5, 22, 31, 10],
                                            data: [{{$esc}}, {{$lab}}, {{$inst}}, {{$vir}}, {{$com}}, {{$hog}}, {{$otro}}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                    </div>
        </section>
    </div>

@endsection

@section('javascript')
    <script src="public/js/jquery.multi-select.js" type="text/javascript"></script>
    <script> $('#my-select').multiSelect()</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script> $('#historial').DataTable({
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
    <script src="{{ asset('dist/js/dependents.js') }}"></script>
@endsection


