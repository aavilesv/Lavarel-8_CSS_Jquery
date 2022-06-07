@extends('layouts.template')
@section('title','Registro de Cantón')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="alert alert-secondary" role="alert">
            <h1 class="title-it">Registro de Cantón</h1>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('provincias.ingresar')}}" method="POST" class="form-control">
            <!--estogenera el token de validacion  -->
            @csrf
            <div class="form-group">
                <select class="chosen-select form-control list" id="articulosucursal" name="provincia_id" data-placeholder="Sucursal">
                    @if ($action =="new" or $action =="edit")
                    @foreach ($cantons as $cliente)
                    <option value="{{ $cliente->id }}">{{$cliente->name}}</option>

                    @endforeach
                    @endif
                </select>
            </div>


            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" onKeyPress="return sololetras(event)" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <small>{{$message}}</small>
                </div>
                @enderror
            </div>

            <div class="form-group">
                <a href="{{route('cantons.cantonlistar')}}" class="btn btn-danger"><i class="fas fa-reply"></i> Cancelar</a>
                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Ingresar</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    alert('msg');
</script>
@endsection