



<form action="{{url('/justicia')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
@include('justicia.form',['modo'=>'crear'])



</form>
