



<form action="{{url('/salud')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
@include('salud.form',['modo'=>'crear'])



</form>
