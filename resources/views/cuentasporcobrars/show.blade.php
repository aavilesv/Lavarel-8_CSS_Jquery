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
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Pago registrado
                        </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            
                            <div class="table-responsive">
                                <div class="card-title">
                                    <i class="fas fa-user"></i> Datos del Cliente
                                </div>
                                <hr>
                                <table class="display table table-striped table-hover table-head-bg-primary">
                                    <tr class="thh">
                                        <th> Nombres y Apellidos:</th>
                                        <td colspan="2"> {{ $cuentacobrar->cclicontratocliente->cliente->nombre }} {{ $cuentacobrar->cclicontratocliente->cliente->apellido }}  </td>
                
                                        <th>Tarifa:</th>
                                        <td colspan="2">$ {{ $cuentacobrar->cclicontratocliente->tarifa }}</td>
                                    </tr>
                                    <tr class="thh">
                                        <th> Documento de Código:</th>
                                        <td colspan="2">
                                            {{ $cuentacobrar->cclicontratocliente->documentocodigo }}
                                        </td>
                
                                        <th>Contrato Código:</th>
                                        <td colspan="2">{{ $cuentacobrar->cclicontratocliente->contratocodigo }}</td>
                                    </tr>
                                    <tr class="thh">
                                        <th>Fecha de pago:</th>
                                        <td>{{ $cuentacobrar->fecha }}</td>
                                        <td colspan="">Abonado:</td>
                                        <td>${{ $cuentacobrar->abonado }}</td>
                                        <td colspan="">Saldo pendiente:</td>
                                        <td>${{ $cuentacobrar->saldo }}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Usuario quien realizo el cobro:
                                            {{ $cuentacobrar->usuariocreador}}
                                        </strong></td>
                                        <td>{{ $cuentacobrar->usuariocreador}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <div class="card-title">
                                    

                                    <i class="fas fa-money-bill-wave"></i> Datos del Pago
                                </div>
                                <hr>
                                <table class="display table table-striped table-bordered add-roww nowrap">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col">Recibo</th>
                                            <th scope="col">Online</th>
                                            <th scope="col">Factura</th>
                                            <th scope="col">Observación</th>
                                            <th scope="col">Banco</th>
                                            <th scope="col">Documento</th>
                                            <th scope="col">Fecha de posito</th>
                                            <th scope="col">Valor Pagado</th>
                                            <th scope="col">Persona que realizó el pago</th>
                                            <th scope="col">Archivo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>  @forelse ($detallecuentascobrar as $detallecuentascobr)
                                        <tr>
                                          <td>{{ $detallecuentascobr->recibo }}</td>
                                          <td>{{ $detallecuentascobr->online }}</td>
                                          <td>{{ $detallecuentascobr->factura }}</td>
                                          <td>{{ $detallecuentascobr->observacion }}</td>
                                          <td>{{ $detallecuentascobr->banco }}</td>
                                          <td>{{ $detallecuentascobr->documento }}</td>
                                          <td>{{ $detallecuentascobr->created_at }}</td>
                                          <td>{{ $detallecuentascobr->valorpagado }}</td>
                                          <td>{{ $detallecuentascobr->parentezco }}</td>
                                          
                                          <td>
                                            <center> <a href="{{ asset($detallecuentascobr->archivo) }}"
                                                data-lightbox="mygallery"
                                                data-title="Archivo">
                                                <img src="{{ asset($detallecuentascobr->archivo) }}" title="ver imagen"
                                                    class="img-fluid center" alt="Responsive image"
                                                    style="width:100px; height:100px;"></a> </center>
                                                </td>
                                         
                                         
                                        </tr>
                                        @empty

                                        <tr>
                                            <td colspan="10"> <center>No existen registros</center></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                              
                                     

                                        <!--<a href="javascript:history.back()"> Volver Atrás</a>-->

                        </div>
                    </div>
                    
                    <div class="">
                        <a href="javascript: history.go(-1)" class="btn btn-primary btn-border btn-round mr-2"><i
                            class="fas fa-reply"></i>
                        Volver</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>


@endsection

