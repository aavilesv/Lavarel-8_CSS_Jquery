@extends('layouts.template')
@section('title','Editar Cliente')
@section('content')

<div class="card">


		<div class="card-header">
		  <h1>Editar Clientes</h1>
		</div>
				

	  <div class="card-body">
<form action="{{route('clientes.update',$cliente)}}" method="POST" class="form-control">
   
	<!--estogenera el token de validacion  -->
	@csrf
	@method('put')



	<div class="form-group">
		<label for="name">Nombre:</label>
		
		<input type="text" name="nombre"  class="form-control" placeholder="Nombre" 
		value="{{old('name',$cliente->name)}}">
		@error('name')
		<small>{{$message}}</small>
	 @enderror
	</div>


	<div class="form-group">
		<label for="apellido">Apellido:</label>
		
		<input type="text" name="apellido"  class="form-control" placeholder="Apellido" 
		value="{{old('apellido',$cliente->apellido)}}">
		@error('apellido')
		<small>{{$message}}</small>
	 @enderror
	</div>

	<div class="form-group">
		<label for="cedula">Cedula:</label>
		
		<input type="text" name="cedula"  class="form-control" placeholder="Cedula" 
		value="{{old('cedula',$cliente->cedula)}}">
		@error('cedula')
		<small>{{$message}}</small>
	 @enderror
	</div>

	<div class="form-group">
		<label for="cedula">Dirección:</label>
		
		<input type="text" name="direccion"  class="form-control" placeholder="Dirección" 
		value="{{old('direccion',$cliente->direccion)}}">
		@error('direccion')
		<small>{{$message}}</small>
	 @enderror
	</div>


	
	<div class="form-group">
		<button class="btn btn-success" type="submit">enviar</button>
	</div>

</form>
</div>
	

</div>
@endsection
