



<form action="{{url('/proteccion')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
@include('proteccion.form',['modo'=>'crear'])



</form>
