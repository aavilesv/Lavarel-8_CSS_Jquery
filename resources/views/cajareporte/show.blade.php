@extends('layouts.template')
@section('title', 'Diario de Caja')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-inbox"></i> Control Diario de Caja</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-archive"></i> Caja y Cobros</h5>
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
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4" style="font-weight: bold;">
                            <div class="form-control">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <div class="row">
                                                <div class="col-md-8">
                                                </div>
                                                <div class="col-md-4" style="font-weight: bold; font-size: 23px;">
                                                    Fecha: {{ $cajaa->fecha }}
                                                </div>
                                                <br><br>
                                                <div class="col-md-5">
                                                    <i class="fas fa-caret-square-up"></i> Control en Caja 
                                                </div>
                                                <div class="col-md-7">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Inicio en Caja</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="${{ $cajaa->cajaprincipal }}"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Dinero entrago al gerente al final del día:</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="${{ $cajaa->saldoingeniero }}"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Total en caja sin restar gerencia</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="${{ $cajaa->cajafinal }}"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            <div class="col-md-3">
                                                <time class="date" datetime="9-25">Total en Caja</time>
                                                <input type="text" id="fechadeposito" name="fechadeposito"
                                                    class="form-control input-border-bottom"
                                                    value="${{ $cajaa->saldocaja }}"
                                                    onKeyPress="return validar(event)"
                                                   oncut="return false" oncopy="return false" onpaste="return false" 
                                                   placeholder="requerido" >
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                
                                <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver"
                                    href="{{ route('reportedit.edit',  $cajaa->id ) }}"><i class="fa fa-plus"></i> Ingresar Cobro  a Clientes</a>
                                <table id=""
                                    class="display table table-bordered table-head-bg-info table-bordered-bd-info mt-4 add-row">
                                    <thead>
                                        <tr class="table-info">
                                            <th>Cliente</th>
                                            <th>Fecha de servicio de </th>
                                            <th>Fecha de servicio hasta</th>
                                            <th>Monto</th>
                                            <th>Abonado</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($caja as $key => $caj)
                                            <tr>
                                                <td>{{ $caj->cuentasporcobrar->cclicontratocliente->cliente->nombre }}
                                                    {{ $caj->cuentasporcobrar->cclicontratocliente->cliente->apellido }}</td>
                                                <td>{{ $caj->fechainicio }}</td>
                                                <td>{{ $caj->fechafinal }}</td>
                                                <td>${{ $caj->monto }}</td>
                                                <td>${{ $caj->abonado }}</td>
                                                <td>{{ $caj->usuariocreado }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="form-control">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-caret-square-up"></i> Control de Gastos
                                        </div>
                                    </div>
                                    <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <button onclick="myFunction('{{ route('reportecaja.edit',  $cajaa->id ) }}')"
                                                            href="#mdsucur" rel="action"
                                                            data-toggle="modal" title="Ingresar" data-backdrop="static" data-keyboard="false"
                                                            class="btn btn-success btn-border btn-round ml-auto">
                                                            <i class="fas fa-calendar-minus"> Ingresar Gasto</i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <time class="date" datetime="9-25">Total en Gasto</time>
                                                        <input type="text" id="gasto" name="gasto"
                                                            class="form-control input-border-bottom"
                                                            onKeyPress="return validar(event)"
                                                            @if ($totalgasto)
                                                            value="${{ $totalgasto->total_sales}}"    
                                                            @else
                                                            value="$0"    
                                                            @endif
                                                           oncut="return false" oncopy="return false" onpaste="return false" 
                                                           placeholder="requerido" >
                                                    </div>
                                                </div>
                                            
                                                <div class="table-responsive">
                                                    <table id=""
                                                        class="display table table-bordered table-head-bg-info table-bordered-bd-info mt-4 add-row nowrap">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>Nombre</th>
                                                                <th>Descripción</th>
                                                                <th>Monto</th>
                                                                <th>Observacion</th>
                                                                <th>Soporte</th>
                                                                <th>Factura</th>
                                                                <th>Archivo</th>
                                                                <th>Usuario</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($gasto as $key => $gast)
                                                                <tr>
                                                                    <td>{{ $gast->nombre }}</td>
                                                                    <td>{{ $gast->descripcion }}</td>
                                                                    <td>${{ $gast->monto }}</td>
                                                                    <td>{{ $gast->observacion }}</td>
                                                                    <td>{{ $gast->soporte }}</td>
                                                                    <td>{{ $gast->factura }}</td>
                                                                    <td><center> <a href="{{ asset($gast->image) }}" data-lightbox="mygallery" data-title=""><img src="{{ asset($gast->image) }}" title="ver imagen" class="img-fluid center" alt="Responsive image" style="width:100px; height:50px;"></a> </center></td>
                                                                    <td>{{ $gast->usuariocreado }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control">
                                <div class="card full-height">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="fas fa-box"></i> Cobros extras
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver"
                                    href="{{ route('cobroextra.show',  $cajaa->id ) }}"><i class="fa fa-plus"></i> Ingresar Cobros extras</a>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-head-bg-info table-bordered-bd-info mt-4 add-row display nowrap">
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
                                                                <th>Usuario</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cobroextra as $cobroextr)
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
                                                                    <td>{{ $cobroextr->usuariocreado }}</td>
                    
                                                                </tr>
                                                            
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                    </div>
                                </div>
                            </div>
                                        <!--<a href="javascript:history.back()"> Volver Atrás</a>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal face animated rotateIn" id="mdsucur" role="dialog">
    </div>


@endsection
@section('scripts')
<script>
    function myFunction(url) {
        $('#mdsucur').load(url, function() {
            $('#mdsucur').modal({
                backdrop: 'static',
                keyboard: false,
                show: true,
                remote: false
            });
        });
        return false;
    }
</script>
@endsection
