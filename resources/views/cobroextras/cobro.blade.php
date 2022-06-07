@extends('layouts.template')
@section('title', 'Listado de Diarios')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-list"></i> Cobros Extras</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-money-bill-wave"></i> Cobros a Clientes</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">


                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                        href="{{ route('cobroextra.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado de Clientes</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Listado de pagos Diarios</div>
                        {{ date('l') }}
                        
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <br>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover display">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Ingresado_por</th>
                                            <th>#Fecha_de_caja</th>
                                            <th>Monto</th>
                                            <th>Observacion</th>
                                            <th>Factura</th>
                                            <th>recibo</th>
                                            <th>online</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cobroextra as $cobroextr)
                                            <tr>
                                                <td>{{ $cobroextr->nombre }}</td>
                                                <td>{{ $cobroextr->descripcion }}</td>
                                                <td>{{ $cobroextr->ingresapor }}</td>
                                                <td>{{ $cobroextr->caja->fecha }}</td>
                                                <td>${{ $cobroextr->monto }}</td>
                                                <td>{{ $cobroextr->observacion }}</td>
                                                <td>{{ $cobroextr->factura }}</td>
                                                <td>{{ $cobroextr->recibo }}</td>
                                                <td>{{ $cobroextr->online }}</td>
                                                
                                               
                                                <td><center> <a href="{{ asset($cobroextr->image) }}" data-lightbox="mygallery" data-title=""><img src="{{ asset($cobroextr->image) }}" title="ver imagen" class="img-fluid center" alt="Responsive image" style="width:100px; height:50px;"></a> </center></td>


                                            </tr>
                                        @empty

                                            <tr>
                                                <td colspan="10">
                                                    <center>No existen registros</center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $cobroextra->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h3 class="modal-title">
                        <span class="fw-mediumbold">
                        </span>
                        <label class="badge badge-warning">Registrar</label>
                        <span class="fw-light">

                        </span>
                    </h3>
                    
                </div>
                <div class="modal-body">
                    <p class="small">Registrar inicial en caja diario.</p>
                    <form method="POST" action="{{ route('diariacobro.store') }}" class="form-createe">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="id" id="cid" value="">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Valores en Caja</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Total en Caja $</label>

                                    <input type="tele" name="saldocaja" id="saldocaja" value="0" required minlength="0"
                                       min="1" class="form-control" placeholder="Total en Caja">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" id="addRowButton" class="btn btn-success">Registrar</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $("#saldocaja").numeric({
        negative: false,
        decimalPlaces: 2
    });

    if("{{ $caja  }}"=== ""){
    $(document).ready(function() {
        $('#myModal').modal(
            {
                    backdrop: 'static',
                    keyboard: false,
                    show: true,
                    remote: false
                });   

    });
}

    $(document).ready(function() {

        $('.conteinerr').on('click', 'a[rel="action"]', function() {

            var data = $(this).data('json'),
                action = data.action,
                id = data.id;

            var nombreapellido = $(this).parents('tr').children('td').eq(2).html();
            var cedula = $(this).parents('tr').children('td').eq(4).html();
            var direccion = $(this).parents('tr').children('td').eq(10).html();
            $('#descripcion').val(nombreapellido);
            $('#cidd').val(id);
            $('#ccedula').val(cedula);
            $('#cdireccion').val(direccion);

            $('#addRowModal').modal();



        });
    });

    var fecha = new Date();
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    var hora = fecha.getHours(); //obteniendo año
    var minut = fecha.getMinutes(); //obteniendo año

    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes; //agrega cero si el menor de 10
    if (minut < 10)
        minut = '0' + minut; //agrega cero si el menor de 10

    

    $('#fechafinal').change(function() {
        if ($('#fechafinal').val() < $('#fechainicial').val()) {
            $('#fechafinal').val('');
            swal("Información!", "Ingresar fecha final mayor a fecha inicial", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
        }
    });
    $('#fechainicial').change(function() {
        if ($('#fechafinal').val() < $('#fechainicial').val()) {
            $('#fechainicial').val('');
            swal("Información!", "Ingresar fecha inicial menor a fecha final", {
                icon: "info",

                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
        }
    });
</script>
@endsection
