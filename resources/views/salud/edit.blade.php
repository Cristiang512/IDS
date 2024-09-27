



<form action="{{url('/salud/' . $salud->id_salud)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('PATCH')}}
@include('salud.form',['modo'=>'editar'])

</form>




