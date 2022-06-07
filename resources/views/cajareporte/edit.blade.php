@extends('layouts.template')
@section('title', 'Cuentas por cobrar')
@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"><i class="flaticon-list"></i> Pago mensual</h1>
                <h5 class="text-white op-7 mb-2"><i class="fas fa-money-bill-wave"></i> Cobros a Clientes</h5>
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
                    <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Cobros registro</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <form action="{{ route('reportedit.update',$caja->id) }}" method="POST"
                            class="form-control form-createe" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card full-height">
                                <div class="card-body">
                                    <ol class="activity-feed">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <i class="fas fa-user"></i> Datos del Cliente
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul>
                                                            <li>
                                                                <label for="cclicontratocliente_id">Clientes:</label>
                                                                <select
                                                                    class="chosen-select form-control input-border-bottom cliente_id"
                                                                    required id="cclicontratocliente_idd"
                                                                    name="cclicontratocliente_id"
                                                                    data-placeholder="Cliente">
                                                                    <option value="" selected disabled hidden>Seleccione
                                                                        un Nombre-Cedula</option>
                                                                    @foreach ($contratocliente as $cliente)
                                                                        <option value="{{ $cliente->id }}"
                                                                            data-cjson='{"cedula":"{{ $cliente->cliente->cedula }}"
                                                                                                    ,"modalidadequipo":"{{ $cliente->modalidadequipo }}"  
                                                                                                    ,"tipodeservicio":"{{ $cliente->tipodeservicio }}"
                                                                                                    ,"comportacion":"{{ $cliente->comportacion }}"
                                                                                                    ,"tarifa":"{{ $cliente->tarifa }}"
                                                                                                    ,"fecha":"{{ $cliente->fecha }}" ,"email":"{{ $cliente->cliente->email }}","anchodebanda":"{{ $cliente->anchodebanda }}","servicio":
                                                                                                    @if ($cliente->servicio == 1) "Radio" @else "Fibra" @endif,"apellido":"{{ $cliente->cliente->apellido }}","nombre":"{{ $cliente->cliente->nombre }}"}'>
                                                                            {{ $cliente->cliente->nombre }}
                                                                            {{ $cliente->cliente->apellido }} :
                                                                            {{ $cliente->cliente->cedula }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('cliente_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <ul>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Nombre</dt>
                                                                    <dd class="nombrre"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Cédula</dt>
                                                                    <dd class="cedulaa"></dd>
                                                                </dl>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <ul>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Apellido</dt>
                                                                    <dd class="appellido"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Email</dt>
                                                                    <dd class="emaill"></dd>
                                                                </dl>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <i class="flaticon-analytics"></i> Detalles de Servicio
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <ul>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Fecha de contrato</dt>
                                                                    <dd class="fechaa"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Servicio</dt>
                                                                    <dd class="servicioo"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Modalidad del Equipo</dt>
                                                                    <dd class="modalidadequipoo"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Pago Mensual</dt>
                                                                    <dd class="tarifaa"></dd>
                                                                </dl>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <ul>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>COMPORTACIÓN</dt>
                                                                    <dd class="comportacionn"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Ancho de Banda</dt>
                                                                    <dd class="anchodebandaa"></dd>
                                                                </dl>
                                                            </li>
                                                            <li type="circle">
                                                                <dl>
                                                                    <dt>Tipo de Servicio</dt>
                                                                    <dd class="tipodeservicioo"></dd>
                                                                </dl>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <i class="far fa-money-bill-alt"></i> Fecha de consumo
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <li class="list-inline-item">
                                                            <time class="date" datetime="9-25"><strong>Desde</strong>
                                                            </time>
                                                            <input type="date" required name="fechainicio"
                                                                id="fechainicial" placeholder="Search ..." value=""
                                                                class="form-control">
                                                        </li>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <li class="list-inline-item">
                                                            <time class="date"
                                                                datetime="9-25"><strong>Hasta</strong></time>
                                                            <input type="date" required id="fechafinal"
                                                                name="fechafinal" placeholder="Search ..." value=""
                                                                class="form-control">
                                                        </li>
                                                    </div>
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <i class="fas fa-money-bill-wave"></i> Registrar cobro
                                                        </div>
                                                    </div>
                                                    <ol class="activity-feed">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6">
                                                                <li class="feed-item feed-item-info">
                                                                    <div class="row">
                                                                        <time class="date" datetime="9-25">Monto
                                                                            pendiente de la tarifa$</time>
                                                                        <input type="text" id="saldo" name="saldo"
                                                                            onKeyPress="return validar(event)"
                                                                            disabled
                                                                            onpaste="return false"
                                                                            class="form-control input-border-bottom"
                                                                            placeholder="Automatico requerido">
                                                                    </div>
                                                                </li>
                                                            </div>

                                                            <div class="col-sm-6 col-md-6">
                                                                <li class="feed-item feed-item-primary">
                                                                    <div class="row">
                                                                        <time class="date"
                                                                            datetime="9-25">Abonado$</time>
                                                                        <input type="number" step="0.01" id="abanado"
                                                                            name="abonado" minlength="1" min="0"
                                                                            class="form-control input-border-bottom decimales"
                                                                            oncopy="return false" onpaste="return false"
                                                                            placeholder="requerido" value="0">
                                                                    </div>
                                                                </li>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <li class="feed-item feed-item-primary">
                                                                    <div class="row">
                                                                        <time class="date" datetime="9-25">Monto total a
                                                                            pagar$</time>
                                                                        <input type="text" min="0" id="valorpagado"
                                                                            name="valorpagado"
                                                                            class="form-control input-border-bottom decimales"
                                                                            oncopy="return false" onpaste="return false"
                                                                            placeholder="requerido" value="0">
                                                                    </div>
                                                                </li>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <li class="feed-item feed-item-info">
                                                                    <div class="row">
                                                                        <time class="date" datetime="9-25">Abonado
                                                                            anterior$</time>
                                                                        <input type="text" id="abonadoanterior"
                                                                            name="abonadoanterior" disabled="disabled"
                                                                            onKeyPress="return validar(event)"
                                                                            onpaste="return false"
                                                                            class="form-control input-border-bottom"
                                                                            placeholder="Automatico requerido"
                                                                            value="0">
                                                                    </div>
                                                                </li>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <li class="feed-item feed-item-info">
                                                                    <div class="row">
                                                                        <time class="date" datetime="9-25"> Saldo
                                                                            anterior$</time>
                                                                        <input type="text" id="totalpagar"
                                                                            name="totalpagar" disabled
                                                                            onKeyPress="return validar(event)"
                                                                            onpaste="return false"
                                                                            class="form-control input-border-bottom"
                                                                            placeholder="Automatico requerido"
                                                                            value="0">
                                                                    </div>
                                                                </li>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <li class="feed-item feed-item-info">
                                                                    <div class="row">
                                                                        <time class="date" datetime="9-25"> Total a
                                                                            guardar en dinero$</time>
                                                                        <input type="text" id="sumatotal"
                                                                            name="sumatotal"
                                                                            disabled 
                                                                            onKeyPress="return validar(event)"
                                                                            onpaste="return false"
                                                                            class="form-control input-border-bottom"
                                                                            placeholder="Automatico requerido"
                                                                            value="0">
                                                                    </div>
                                                                </li>
                                                            </div>
                                                        </div>
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <i class="fas fa-money-check-alt"></i> Detallar pagos
                                                    </div>
                                                </div>
                                                <ol class="activity-feed">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-success">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">#Recibo</time>
                                                                    <input type="text" id="recibo" name="recibo"
                                                                        class="form-control input-border-bottom decimales"
                                                                        oncopy="return false" onpaste="return false"
                                                                        placeholder="No requerido">
                                                                </div>
                                                            </li>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-success">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Online</time>
                                                                    <input type="text" id="online" name="online"
                                                                        class="form-control input-border-bottom"
                                                                        oncut="return false" oncopy="return false"
                                                                        onpaste="return false"
                                                                        placeholder="No requerido">
                                                                </div>
                                                            </li>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-primary">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Factura</time>
                                                                    <input type="text" id="factura" name="factura"
                                                                        class="form-control input-border-bottom"
                                                                        oncut="return false" oncopy="return false"
                                                                        onpaste="return false" placeholder="requerido">
                                                                </div>
                                                            </li>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-info">
                                                                <div class="row">
                                                                    <time class="date"
                                                                        datetime="9-25">Observación</time>
                                                                    <input type="text" id="observacion"
                                                                        name="observacion" onpaste="return false"
                                                                        class="form-control input-border-bottom"
                                                                        placeholder="Automatico requerido">
                                                                </div>
                                                            </li>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-success">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Documento</time>
                                                                    <input type="text" id="documento" name="documento"
                                                                        class="form-control input-border-bottom"
                                                                        oncut="return false" oncopy="return false"
                                                                        onpaste="return false"
                                                                        placeholder="No requerido">
                                                                </div>
                                                            </li>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-primary">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Banco</time>
                                                                    <input type="text" id="banco" name="banco"
                                                                        class="form-control input-border-bottom"
                                                                        oncut="return false" oncopy="return false"
                                                                        onpaste="return false" placeholder="requerido">
                                                                </div>
                                                            </li>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-primary">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Fecha del
                                                                        Deposito</time>
                                                                    <input type="date" id="fechadeposito"
                                                                        name="fechadeposito"
                                                                        class="form-control input-border-bottom"
                                                                        oncut="return false" oncopy="return false"
                                                                        onpaste="return false" placeholder="requerido">
                                                                </div>
                                                            </li>
                                                        </div>

                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-primary">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Archivo</time>
                                                                    <input type="file" id="archivo" name="archivo"
                                                                        class="form-control input-border-bottom imagejs"
                                                                        accept="image/*" oncut="return false"
                                                                        oncopy="return false" onpaste="return false"
                                                                        placeholder="requerido" value="sd">
                                                                </div>
                                                            </li>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <li class="feed-item feed-item-primary">
                                                                <div class="row">
                                                                    <time class="date" datetime="9-25">Parentezco</time>
                                                                    <input type="text" id="parentezco" name="parentezco"
                                                                        class="form-control input-border-bottom"
                                                                        oncut="return false" oncopy="return false"
                                                                        onpaste="return false" placeholder="requerido"
                                                                        value="">
                                                                </div>
                                                            </li>
                                                        </div>
                                                    </div>
                                                </ol>
                                            </div>
                                        </div>
                                    </ol>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4 ml-auto mr-auto">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <i class="fas fa-money-check-alt"></i> Saldo pendiente
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table
                                                    class="display table table-striped table-hover table-head-bg-primary">
                                                    <thead>
                                                        <tr class="table-info">
                                                            <th>ID</th>
                                                            <th>Fecha</th>
                                                            <th>Saldo</th>
                                                            <th COLSPAN=3 class="col-xs-1">
                                                                <i class="fa fa-cog" aria-hidden="true">Acción</i>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tdetalle">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4 ml-auto mr-auto">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <i class="fas fa-money-check-alt"></i> Abando pendiente
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table
                                                    class="display table table-striped table-hover table-head-bg-primary">
                                                    <thead>
                                                        <tr class="table-info">
                                                            <th>ID</th>
                                                            <th>Fecha</th>
                                                            <th>Abonado del mes pasado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tabonado">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="ml-md-auto py-2 py-md-0">
                                        <a href="javascript: history.go(-1)"
                                            class="btn btn-danger btn-border btn-round mr-2"><i
                                                class="fas fa-reply"></i>
                                            Volver</a>
                                        <button id="Dato-registrar" class="btn btn-success btn-border btn-round mr-2"
                                            type="submit"><i class="fas fa-save"></i>
                                            Ingresar</button>
                                    </div>


                                    <!--<a href="javascript:history.back()"> Volver Atrás</a>-->




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
    var pagomensual = 0;
    var totalsaldo = 0;
    var abonadototal = 0;
    var idcuentascobrar = 0;
    var pagomensual1 = 0;
    var tarifames=1;
    $('#Dato-registrar').click(function(){
        if($('#cclicontratocliente_idd').val()){

            $("input").prop('disabled', false);
        pagototal();
        }else
        {
            swal("Información!", "Ingresar un cliente", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });

            return false;
        }
    });
    
    
    function cmbofecha(){
        var fechahoyd = new Date();
        var mes = fechahoyd.getMonth() + 1; //obteniendo mes
        var dia = fechahoyd.getDate(); //obteniendo dia
        var ano = fechahoyd.getFullYear(); //obteniendo año
        document.getElementById('fechainicial').value = ano + "-" +(mes < 10 ?  "0"+mes : mes)+ "-" + (dia < 10 ?  "0"+dia : dia);
        fechahoyd.setMonth(fechahoyd.getMonth() + 1);
        mes = fechahoyd.getMonth() + 1; //obteniendo mes
        dia = fechahoyd.getDate(); //obteniendo dia
        document.getElementById('fechafinal').value = ano + "-" +(mes < 10 ?  "0"+mes : mes)+ "-" + (dia < 10 ?  "0"+dia : dia);
    }

    function calcularmeses(){
        var fechafinall = document.getElementById("fechafinal").value;
        var fechainicial = document.getElementById("fechainicial").value;
        var array_fechafinal = fechafinall.split("-");
        var array_fechainicial = fechainicial.split("-");
        tarifames=(parseFloat(array_fechafinal[1])<= parseFloat(array_fechainicial[1])? 1:parseFloat(array_fechafinal[1])- parseFloat(array_fechainicial[1]));
        $('#saldo').val(parseFloat(pagomensual1));
        $('#saldo').val(parseFloat(parseFloat($('#saldo').val())*tarifames));
        pagomensual=$('#saldo').val();
    }
    $('#fechafinal').change(function() {
        var fechafinall = document.getElementById("fechafinal").value;
        var fechainicial = document.getElementById("fechainicial").value;
        var array_fechafinal = fechafinall.split("-");
        var array_fechainicial = fechainicial.split("-");
        tarifames=(parseFloat(array_fechafinal[1])<= parseFloat(array_fechainicial[1])? 1:parseFloat(array_fechafinal[1])- parseFloat(array_fechainicial[1]));
        $('#saldo').val(parseFloat(pagomensual1));
        $('#saldo').val(parseFloat(parseFloat($('#saldo').val())*tarifames));
        pagomensual=$('#saldo').val();
        if (($('#fechafinal').val() < $('#fechainicial').val()) || (parseFloat(array_fechafinal[1]) == parseFloat(array_fechainicial[1]))) {
            swal("Información!", "Ingresar fecha final mayor a fecha inicial", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
            cmbofecha();
        }

        
    });

    $('#fechainicial').change(function() {
        var fechafinall = document.getElementById("fechafinal").value;
        var fechainicial = document.getElementById("fechainicial").value;
        var array_fechafinal = fechafinall.split("-");
        var array_fechainicial = fechainicial.split("-");
        tarifames=(parseFloat(array_fechafinal[1])<= parseFloat(array_fechainicial[1])? 1:parseFloat(array_fechafinal[1])- parseFloat(array_fechainicial[1]));
        $('#saldo').val(parseFloat(pagomensual1));
        $('#saldo').val(parseFloat(parseFloat($('#saldo').val())*tarifames));
        pagomensual=$('#saldo').val();
        if ($('#fechafinal').val() < $('#fechainicial').val() || (parseFloat(array_fechafinal[1]) == parseFloat(array_fechainicial[1]))) {
            swal("Información!", "Ingresar fecha inicial menor a fecha final", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
            cmbofecha();
        }
        
        
    });
    $("#saldo").numeric({
        negative: false,
        decimalPlaces: 2
    });
    $("#abanado").numeric({
        negative: false,
        decimalPlaces: 2
    });
    $("#valorpagado").numeric({
        negative: false,
        decimalPlaces: 2
    });
    $("#recibo").numeric({
        decimal: false,
        negative: false
    }, function() {
        alert("Positive integers only");
        this.value = "";
        this.focus();
    });
    $("#valorpagado, #abanado").mouseleave(function(e) {
        pagototal();
    });
    
    $('#valorpagado, #abanado').mouseenter(function(event) {
        pagototal();
    });
    function pagototal() {
        $('#abanado').val((($('#abanado').val().length==0) ? 0 : $('#abanado').val()));
        $('#valorpagado').val((($('#valorpagado').val().length==0) ? 0 : $('#valorpagado').val()));
        if (pagomensual != 0) {
            var total = parseFloat($('#abonadoanterior').val());
            total += parseFloat($('#valorpagado').val());

            var totalsuma = parseFloat($('#totalpagar').val());
            totalsuma += parseFloat($('#valorpagado').val());
            totalsuma += parseFloat($('#abanado').val());
            if (pagomensual >= total && $('#valorpagado').val().length != 0) {
                $('#saldo').val(stocktotal(pagomensual, total));
                $('#sumatotal').val(totalsuma);
            } else {

                total = pagomensual - parseFloat($('#saldo').val());
                $('#saldo').val(stocktotal(total, 0));
                $('#valorpagado').val(parseInt(document.getElementById("valorpagado").min));
                swal("Monto ingresado es mayor a la tarifa!", {
                    icon: "info",
                    buttons: {
                        confirm: {
                            className: 'btn btn-warning'
                        }
                    },
                });
            }
        }
    }
    

    function stocktotal(number, nuevo) {
        return parseFloat(number).toFixed(2) - parseFloat(nuevo).toFixed(2);
    }
    $('#cclicontratocliente_idd').change(function() {
        cmbofecha();    
        var multitotal=0;
        $('#valorpagado').val(0);
        $('#totalpagar').val(0);
        $('#sumatotal').val(0);
        var cliente = $('#cclicontratocliente_idd option:selected').data('cjson');
        $('#saldo').val(stocktotal(cliente.tarifa, $('#valorpagado').val()));
        $('.appellido').html('');
        $(".appellido").append(cliente.apellido);
        $('.nombrre').html('');
        $(".nombrre").append(cliente.nombre);
        $('.cedulaa').html('');
        $(".cedulaa").append(cliente.cedula);
        $('.emaill').html('');
        $(".emaill").append(cliente.email);
        $('.fechaa').html('');
        $(".fechaa").append(cliente.fecha);
        $('.servicioo').html('');
        $(".servicioo").append(cliente.servicio);
        $('.comportacionn').html('');
        $(".comportacionn").append(cliente.comportacion);
        $('.anchodebandaa').html('');
        $(".anchodebandaa").append(cliente.anchodebanda);
        $('.tipodeservicioo').html('');
        $(".tipodeservicioo").append(cliente.tipodeservicio);
        $('.modalidadequipoo').html('');
        $(".modalidadequipoo").append(cliente.modalidadequipo);
        $('.modalidadequipoo').html('');
        $(".modalidadequipoo").append(cliente.modalidadequipo);
        $('.tarifaa').html('');
        $(".tarifaa").append("$" + cliente.tarifa);
        pagomensual = (cliente.tarifa);
        pagomensual1= (cliente.tarifa);
        tablecargar();
    });
    function tablecargar() {
        var dato = 0;
        var totalabonado = 0;
        $.ajax({
            type: "GET",
            url: '{{ route('mostrarclientecobrar.index') }}',
            data: {
                id: $('#cclicontratocliente_idd').val()
            },
            dataType: 'json',
            success: function(data) {
                app.cobrar.cuentacobrarabonado = [];
                app.cobrar.cuentacobrar = [];
                $('.tdetalle').html('');
                data.cuentascobrarsaldo.forEach(function(cobrar, index) {
                    var item = new Object();
                    item.id = cobrar.id;
                    item.saldo = cobrar.saldo;
                    item.fecha = cobrar.fecha;
                    item.final = cobrar.saldo;
                    app.add(item);
                });
                $('.tabonado').html('');
                data.cuentascobrarabonado.forEach(function(cobrar, index) {
                    var iabado = new Object();
                    iabado.id = cobrar.id;
                    iabado.fecha = cobrar.fecha;
                    iabado.final = cobrar.saldo;
                    iabado.abonado = cobrar.abonado;
                    totalabonado += parseFloat(cobrar.abonado);
                    app.addabo(iabado);
                });
                abonadototal = totalabonado;
                //$('#valorpagado').val(parseFloat($('#valorpagado').val())+parseFloat(abonadototal));
                $('#abonadoanterior').val(abonadototal);
                pagototal();
                
            }
        });
    }

    function buttoncobrar(number, saldo) {
        swal({
            title: 'Esta seguro de Cobrar la deuda?',
            text: "No se podrá retrocer!",
            type: 'info',
            icon: 'info',
            buttons: {
                cancel: {
                    visible: true,
                    text: 'No, cancelar!',
                    className: 'btn btn-danger'
                },
                confirm: {
                    text: 'Si, realizar cobro!',
                    className: 'btn btn-success'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $('#totalpagar').val(parseFloat($('#totalpagar').val()) + parseFloat(saldo));
                $.ajax({
                    type: "GET",
                    url: '{{ route('mostrarclientecobrar.create') }}',
                    data: {
                        id: number,
                        saldo: saldo
                    },
                    dataType: 'json',
                    success: function(data) {
                        tablecargar();
                    }
                });

            } else {}
        });
    }
    var app = {
        cobrar: {
            cuentacobrarabonado: [],
            cuentacobrar: []
        },
        addabo: function(item) {
            if (!this.existeabonado(item)) {
                this.cobrar.cuentacobrarabonado.push(item);
            }
            this.presentarabonado();
            return true;
        },
        add: function(item) {
            if (!this.existe(item)) {
                this.cobrar.cuentacobrar.push(item);
            }
            this.presentar();
            return true;
        },
        existeabonado: function(item) {
            for (var i in this.cobrar.cuentacobrarabonado) {
                if (item.id == this.cobrar.cuentacobrarabonado[i].id) {
                    return true;
                }
            }
            return false;
        },
        existe: function(item) {
            for (var i in this.cobrar.cuentacobrar) {
                if (item.id == this.cobrar.cuentacobrar[i].id) {
                    return true;
                }
            }
            return false;
        },
        sumar: function(id, saldo) {
            for (var i in this.cobrar.cuentacobrar) {
                if (id == this.cobrar.cuentacobrar[i].id) {
                    if (this.cobrar.cuentacobrar[i].saldo < this.cobrar.cuentacobrar[i].final) {
                        this.cobrar.cuentacobrar[i].saldo += 1;
                        this.presentar();
                    }
                    return true;
                }
            }
            return false;
        },
        restar: function(id, saldo) {
            for (var i in this.cobrar.cuentacobrar) {
                if (id == this.cobrar.cuentacobrar[i].id) {
                    if (this.cobrar.cuentacobrar[i].saldo > 1) {
                        this.cobrar.cuentacobrar[i].saldo -= 1;
                        this.presentar();
                    }
                    return true;
                }
            }
            return false;
        },
        presentarabonado: function() {
            $('.tabonado').html('');
            for (var iabado of this.cobrar.cuentacobrarabonado) {
                var tr = '<tr>';
                tr += '<td id="des">' + iabado.id + '</td>';
                tr += '<td>' + iabado.fecha + '</td>';
                tr += '<td>$' + iabado.abonado + '</td>';
                tr += '</tr>';
                $('.tabonado').append(tr);
            }
        },
        presentar: function() {
            $('.tdetalle').html('');
            for (var item of this.cobrar.cuentacobrar) {
                var tr = '<tr>';
                tr += '<td id="des">' + item.id + '</td>';
                tr += '<td>' + item.fecha + '</td>';
                tr += '<td>$' + item.saldo + '</td>';
                tr += '<td class=""><a onclick="app.restar(' + item.id + ',' + item.saldo +
                    ')"  title="Restar"class="btn btn-round btn-warning"><i class="fas fa-minus"></i> </a></td>';
                tr += '<td class=""><a onclick="app.sumar(' + item.id + ',' + item.saldo +
                    ')"  title="Sumar"class="btn btn-round btn-secondary"><i class="fas fa-plus"></i> </a></td>';
                tr += '<td class=""><a onclick="buttoncobrar(' + item.id + ',' + item.saldo +
                    ')"  title="Cobrar"class="btn btn-round btn-success cuentaclick"><i class="fas fa-money-bill"></i> </a></td>';
                tr += '</tr>';
                $('.tdetalle').append(tr);
            }
        },
    }
</script>
@endsection
