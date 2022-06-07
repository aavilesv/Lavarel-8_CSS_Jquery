@extends('layouts.template')
@section('title', 'Asistencia')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="far fa-id-card"></i> Asistencia</h1>
                    <h5 class="text-white op-7 mb-2"><i class="fas fa-user"></i> Empleado</h5>
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
                        <div class="card-title"><i class="far fa-list-alt"></i> Registar</div>
                        <div class="card-category"><i class="fas fa-tablet-alt"></i> Registrar Asistencia</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <form action="{{ route('rrhasistencias.store') }}" id="miForm" name="form_reloj"
                                class="form-control form-createee" method="POST">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <div class="col-md-12" style="width: 100%; text-align: center;
                                                                    font-size: 30px;  background:#14fff2; 
                                                                  color: indigo;  text-shadow: 1px 1px #fff;
                                                                   font-weight: bold;">
                                                        <i class="fas fa-user"></i>

                                                        Registar Asistencia
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" style="width: 100%; text-align: center;
                                                                             font-size: 28px;
                                                                           color: indigo;  text-shadow: 1px 1px #fff;
                                                                            font-weight: bold;">
                                                            <i class="far fa-calendar-alt"></i> Fecha:
                                                            {{ date('F j, Y') }}
                                                        </div>

                                                    </div>
                                                    <input type="text" style="width: 100%; text-align: center; font-size: 25px;
                                                                         background: cadetblue; color: indigo;  text-shadow: 1px 1px #fff;
                                                                         font-weight: bold;" class="form-control"
                                                        onKeyPress="return soloNumeros(event)" name="reloj" size="10">

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12  ml-auto mr-auto">
                                                        <div class="form-check">
                                                            <center> <label>Eligir opción</label><br /></center>
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="optionsRadios" value="he" checked="">
                                                                <span class="form-radio-sign">Entrada</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="optionsRadios" value="hsa">
                                                                <span class="form-radio-sign">Salida de Almuerzo</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="optionsRadios" value="hea">
                                                                <span class="form-radio-sign">Entra de Almuerzo</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio"
                                                                    name="optionsRadios" value="hs">
                                                                <span class="form-radio-sign">Salida</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ml-auto mr-auto">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Ingresar su cedula</time>
                                                                <input type="tel" name="cedula"        
                                                              
                                                                autocomplete="off"
                                                                    onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                    minlength="10" class="form-control input-border-bottom positive"
                                                                    required placeholder="Cedula"
                                                                    onpaste="return false"
                                                                    value="{{ old('cedula') }}">


                                                                @if ($message = Session::get('cedula'))
                                                                    <div class="alert alert-info" role="alert">
                                                                        <p class="mb-0">{{ $message }}.</p>
                                                                    </div>

                                                                @endif
                                                            </div>
                                                        </li>
                                                    </ol>
                                                    <div class="ml-md-auto py-2 py-md-0">
                                                        <button class="btn btn-success btn-border btn-round mr-2"
                                                            type="submit"><i class="fas fa-save"></i> Ingresar</button>
                                                    </div>
                                                    
                                                </div>


                                            </div>
                                        </div>
                                    </div>
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
        $(".positive").numeric({ negative: false }); 
     
    //    alert($('input:radio[name=optionsRadios]:checked').val());
    $('.form-createee').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });

        function mueveReloj() {
            momentoActual = new Date()
            hora = momentoActual.getHours()
            minuto = momentoActual.getMinutes()
            segundo = momentoActual.getSeconds()

            horaImprimible = hora + " : " + minuto + " : " + segundo

            document.form_reloj.reloj.value = horaImprimible

            setTimeout("mueveReloj()", 1000)
        }

    </script>
@endsection
