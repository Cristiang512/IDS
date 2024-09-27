
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
                        <li class="breadcrumb-item active">Protección</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </section>
              <div class="col-md-12">
                  <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title">Protección</h3>
                    </div>
                    <!-- <form> -->
                      <div class="card-body">
                        <div class="form-group">
                            <label for="adopto">Adoptó Medidas de Protección en el Contexto Familiar*</label>
                            <select name="adopto" id="adopto" class="form-control {{$errors->has('adopto')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->adopto == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->adopto == 'No' ? 'selected' : '' ) }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="medida">Medida Adoptada*</label>
                            <select name="medida" id="medida" class="form-control {{$errors->has('medida')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Rescate de NNA en el contexto familiar" {{ $modo == 'crear' ? 'Rescate de NNA en el contexto familiar' : ($salud->medida == 'Rescate de NNA en el contexto familiar' ? 'selected' : '' ) }}>Rescate de NNA en el contexto familiar</option>
                                <option value="Restablecimiento de derechos" {{ $modo == 'crear' ? 'Restablecimiento de derechos' : ($salud->medida == 'Restablecimiento de derechos' ? 'selected' : '' ) }}>Restablecimiento de derechos</option>
                                <option value="Custodia provisional de NNA a un cónyuge" {{ $modo == 'crear' ? 'Custodia provisional de NNA a un cónyuge' : ($salud->medida == 'Custodia provisional de NNA a un cónyuge' ? 'selected' : '' ) }}>Custodia provisional de NNA a un cónyuge</option>
                                <option value="Fijar cuota provisional de alimentos de adulto mayor" {{ $modo == 'crear' ? 'Fijar cuota provisional de alimentos de adulto mayor' : ($salud->medida == 'Fijar cuota provisional de alimentos de adulto mayor' ? 'selected' : '' ) }}>Fijar cuota provisional de alimentos de adulto mayor</option>
                                <option value="Desalojo de victimario" {{ $modo == 'crear' ? 'Desalojo de victimario' : ($salud->medida == 'Desalojo de victimario' ? 'selected' : '' ) }}>Desalojo de victimario</option>
                                <option value="Acompañamiento para reingreso al domicilio" {{ $modo == 'crear' ? 'Acompañamiento para reingreso al domicilio' : ($salud->medida == 'Acompañamiento para reingreso al domicilio' ? 'selected' : '' ) }}>Acompañamiento para reingreso al domicilio</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="formulacion">Formulación de Denuncia Penal*</label>
                            <select name="formulacion" id="formulacion" class="form-control {{$errors->has('formulacion')?'is-invalid' : ''}}" required>
                                <option
                                value="" > Seleccione...
                                </option>
                                <option value="Si" {{ $modo == 'crear' ? 'Si' : ($salud->formulacion == 'Si' ? 'selected' : '' ) }}>Si</option>
                                <option value="No" {{ $modo == 'crear' ? 'No' : ($salud->formulacion == 'No' ? 'selected' : '' ) }}>No</option>
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
                      <input type="submit" class="btn btn-danger" value="{{ $modo=='crear' ? 'Agregar Seguimiento':'Modificar Seguimiento'}}">

                      <!-- <button type="submit" class="btn btn-primary" value="{{ $modo=='crear' ? 'Agregar Información del Caso':'Modificar Información del Caso'}}"></button> -->
                      <a href="javascript:history.back(-1);" class="btn btn-danger float-right">Cancelar</a>
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