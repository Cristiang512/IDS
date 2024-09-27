
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
        <section class="content-header">
          <div class="container-fluid">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>
                      Seguimiento Intersectorial del Caso
                      </h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:history.back(-1);">Atrás</a></li>
                        <li class="breadcrumb-item active">Justicia</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </section>
              <div class="col-md-12">
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Justicia</h3>
                    </div>
                    <!-- <form> -->
                      <div class="card-body">
                        <div class="form-group">
                            <label for="conocimiento">Conocimiento del Caso Por Noticia Criminal*</label>
                            <select name="conocimiento" id="conocimiento" class="form-control {{$errors->has('conocimiento')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->conocimiento == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->conocimiento == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado de la Investigación*</label>
                            <select name="estado" id="estado" class="form-control {{$errors->has('estado')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Fase de indagación" {{ $modo == 'crear' ? 'Fase de indagación' : ($salud->estado == 'Fase de indagación' ? 'selected' : '' ) }}>Fase de indagación</option>
                                <option value="Fase de investigación" {{ $modo == 'crear' ? 'Fase de investigación' : ($salud->estado == 'Fase de investigación' ? 'selected' : '' ) }}>Fase de investigación</option>
                                <option value="Fase de juicio" {{ $modo == 'crear' ? 'Fase de juicio' : ($salud->estado == 'Fase de juicio' ? 'selected' : '' ) }}>Fase de juicio</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="captura">Captura del Agresor*</label>
                            <select name="captura" id="captura" class="form-control {{$errors->has('captura')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->captura == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->captura == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="activacion">Activación de Ruta (Remisión)*</label>
                            <select name="activacion" id="activacion" class="form-control {{$errors->has('activacion')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Salud" {{ $modo == 'crear' ? 'Salud' : ($salud->activacion == 'Salud' ? 'selected' : '' ) }}>Salud</option>
                                <option value="Protección" {{ $modo == 'crear' ? 'Protección' : ($salud->activacion == 'Protección' ? 'selected' : '' ) }}>Protección</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="proteccion">Protección a Víctima en Proceso Penal*</label>
                            <select name="proteccion" id="proteccion" class="form-control {{$errors->has('proteccion')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->proteccion == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->proteccion == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="caso_sit">Caso en Situación de Flagrancia*</label>
                            <select name="caso_sit" id="caso_sit" class="form-control {{$errors->has('caso_sit')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->caso_sit == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->caso_sit == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="responsable">Responsable de Cadena de Custodia*</label>
                            <select name="responsable" id="responsable" class="form-control {{$errors->has('responsable')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->responsable == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->responsable == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="informe">Informe de Evaluación Médico Legal por Medicina Legal*</label>
                            <select name="informe" id="informe" class="form-control {{$errors->has('informe')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->informe == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->informe == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="observaciones">Observaciones*</label>
                          <input type="text" name="observaciones" id="observaciones" class="form-control {{$errors->has('observaciones')?'is-invalid' : ''}}"
                            value="{{ isset($salud->observaciones)?$salud->observaciones:old('observaciones')}}" required>
                            {!! $errors->first('observaciones','<div class="invalid-feedback">:message</div>')!!}
                        </div>

                        <div class="form-group">
                            <label for="evidencia">Evidencia</label>
                            <input type="file" name="evidencia" id="evidencia" class="form-control" accept = "application/pdf, image/jpeg, image/jpg">
                        </div>

                        <input type="hidden" id="id_informacion" name="id_informacion" value="{{ $modo=='crear' ? $id_informacion:$salud->id_informacion}}">

                      <div class="card-footer">
                      <input type="submit" class="btn btn-warning" value="{{ $modo=='crear' ? 'Agregar Seguimiento':'Modificar Seguimiento'}}">

                      <!-- <button type="submit" class="btn btn-primary" value="{{ $modo=='crear' ? 'Agregar Información del Caso':'Modificar Información del Caso'}}"></button> -->
                      <a href="javascript:history.back(-1);" class="btn btn-warning float-right">Cancelar</a>
                      </div>
                    <!-- </form> -->
                  </div>
              </div>
      </section>
  </div>        
@endsection

<style>
input.largerCheckbox {
        transform : scale(2);
    }
    body {
        text-align:center;
        margin-top:10px;
    }

.linea {
  border-top: 1px solid black;
  height: 2px;
  max-width: 200px;
  padding: 0;
  margin: 20px auto 0 auto;
}
</style>