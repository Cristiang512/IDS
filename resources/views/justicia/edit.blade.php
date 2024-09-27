



<form action="{{url('/justicia/' . $justicia->id_justicia)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('PATCH')}}
@include('justicia.form',['modo'=>'editar'])

</form>




