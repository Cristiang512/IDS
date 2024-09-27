
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
                        <li class="breadcrumb-item active">Salud</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </section>
              <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Salud</h3>
                    </div>
                    <!-- <form> -->
                      <div class="card-body">
                        <div class="form-group">
                            <label for="pro_vih">Profilaxis VIH*</label>
                            <select name="pro_vih" id="pro_vih" class="form-control {{$errors->has('pro_vih')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->pro_vih == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->pro_vih == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pro_hepa">Profilaxis Hepatitis B*</label>
                            <select name="pro_hepa" id="pro_hepa" class="form-control {{$errors->has('pro_hepa')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->pro_hepa == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->pro_hepa == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pro_otras">Otras Profilaxis*</label>
                            <select name="pro_otras" id="pro_otras" class="form-control {{$errors->has('pro_otras')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->pro_otras == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->pro_otras == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="anticoncepcion">Anticoncepción de Emergencia*</label>
                            <select name="anticoncepcion" id="anticoncepcion" class="form-control {{$errors->has('anticoncepcion')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->anticoncepcion == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->anticoncepcion == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="orientacion">Orientación IVE*</label>
                            <select name="orientacion" id="orientacion" class="form-control {{$errors->has('orientacion')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->orientacion == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->orientacion == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="salud_mental">Salud Mendal*</label>
                            <select name="salud_mental" id="salud_mental" class="form-control {{$errors->has('salud_mental')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->salud_mental == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->salud_mental == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="remision">Remisión a Protección*</label>
                            <select name="remision" id="remision" class="form-control {{$errors->has('remision')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->remision == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->remision == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="informe">Informe a Autoridades / Denuncia a Policía Judicial, Fiscalía, Policía Nacional*</label>
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
                            <input type="file" name="evidencia" id="evidencia" class="form-control" accept ="application/pdf, image/jpeg, image/jpg">
                        </div>

                        <input type="hidden" id="id_informacion" name="id_informacion" value="{{ $modo=='crear' ? $id_informacion:$salud->id_informacion}}">

                      <div class="card-footer">
                      <input type="submit" class="btn btn-primary" value="{{ $modo=='crear' ? 'Agregar Seguimiento':'Modificar Seguimiento'}}">

                      <!-- <button type="submit" class="btn btn-primary" value="{{ $modo=='crear' ? 'Agregar Información del Caso':'Modificar Información del Caso'}}"></button> -->
                      <a href="javascript:history.back(-1);" class="btn btn-primary float-right">Cancelar</a>
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