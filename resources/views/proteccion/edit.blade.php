



<form action="{{url('/proteccion/' . $proteccion->id_proteccion)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('PATCH')}}
@include('proteccion.form',['modo'=>'editar'])

</form>




