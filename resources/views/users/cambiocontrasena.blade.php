@extends('layouts.template')

@section('title', 'Cambio de contraseña')

@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-user"></i> Cambio de contraseña</h1>


                </div>
                <div class="ml-md-auto py-2 py-md-0">
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> {{ $user->nombre }}
                            {{ $user->apellido }} </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="{{ route('usuario.cambiar') }}" method="POST" enctype="multipart/form-data"
                                class="form-control">
                                <!--estogenera el token de validacion  -->
                                @csrf

                                <div class="form-group">
                                    <label for="mypassword">Introduce tu actual password:</label>
                                    <input type="password" name="mypassword" autocomplete="off" class="form-control">
                                    <div class="text-danger">{{ $errors->first('mypassword') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Introduce tu nuevo password:</label>
                                            <input type="password" name="password" id="password" autocomplete="off"
                                                autocomplete="new-password" class="form-control"
                                                onfocus="this.removeAttribute('readonly');">
                                            <div class=" text-danger">{{ $errors->first('password') }}
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Ver Contraseña:</label>
                                                <br>
                                                <h3 title="Ver Contraseña nueva"> <strong><span id="clipassword"
                                                            class="fa fa-eye fa-1x"></span></strong>
                                                </h3>
                                            </div>
                                        </div>
                                   
                                </div>


                                



                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ route('usuario.index') }}"
                                        class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i>
                                        Cancelar</a>
                                    <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                                            class="fas fa-save"></i> Ingresar</button>
                                </div>




                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
@section('scripts')
    <script>
        $("#clipassword").mouseleave(function(e) {
            document.getElementById('password').type = 'password'

        });
        $('#clipassword').mouseenter(function(event) {
            document.getElementById('password').type = 'text'

        });
        $(document).ready(function() {

            $('.conteinerr').on('click', 'a[rel="action"]', function() {

                var data = $(this).data('json'),
                    action = data.action,
                    id = data.id;

                var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
                var cedula = $(this).parents('tr').children('td').eq(3).html();
                var direccion = $(this).parents('tr').children('td').eq(9).html();
                $('#descripcion').val(nombreapellido);
                $('#cid').val(id);
                $('#ccedula').val(cedula);
                $('#cdireccion').val(direccion);

                $('#addRowModal').modal();



            });
        });

    </script>
@endsection
