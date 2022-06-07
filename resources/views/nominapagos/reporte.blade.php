@extends('layouts.template')

@section('title', 'Listado de Provincias')

@section('content')


<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"><i class="flaticon-agenda-1"></i> Nomina de Pagos</h1>

                <h5 class="text-white op-7 mb-2"><i class="far fa-calendar-alt"></i> Nomina</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">

                <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ingresar"
                    href="{{ route('provincias.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title"><i class="far fa-list-alt"></i> Roles</div>
                    <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Roles de pagos de Empleados
                        Registrados</div>
                        <form class="navbar-left navbar-form nav-search mr-md-12">
                            <div class="form-group text">
                                <ul class="list-inline">
                                    <li class="list-inline-item">

                                        <time class="date" datetime="9-25"><strong>Desde</strong> </time>
                                            <input type="date"
                                            required name="fechainicial" id="fechainicial" placeholder="Search ..."
                                            value="{{ old('fechainicial', $buscarincial) }}"
                                             class="form-control">
                                     
                                                </li>
                                    <li class="list-inline-item">  
                                        <time class="date" datetime="9-25"><strong>Hasta</strong></time>
                                            <input type="date" required id="fechafinal" 
                                            name="fechafinal" placeholder="Search ..." 
                                            value="{{ old('fechafinal', $buscarfinal) }}"
                                            class="form-control">
                                     
                                    </li>
                                    <li class="list-inline-item">  
                                       
                                        <button type="submit" title="Buscar" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>
                                 
                                </li>     
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                   
                                </div>
                               
                                <div class="col-2">
                               
                                </div>
                            </div>
                        </form>
                        
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                        <div class="collapse" id="search-nav">
                            <div class="card-body">
                             
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" cellspacing="0" width="100%"
                                class="display table table-striped table-hover add-row">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Sueldo</th>
                                        <th scope="col">Horas extras</th>
                                        <th scope="col">Comisionees</th>
                                        <th scope="col">Días Laborales</th>
                                        <th scope="col">Líquido </th>
                                        <th scope="col">Prestamos quirogra iess</th>
                                        <th scope="col">Descuentos de internet</th>
                                        <th scope="col">Aporte al IESS</th>
                                        <th scope="col">Prestamos y Anticipos</th>
                                        <th scope="col">Total Descuentos</th>
                                        
                                        
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nomina as $provincia)
                                        <tr data-id="{{ $provincia->id }}">
                                            <td>{{ $provincia->id }}</td>
                                            <td>{{ $provincia->rrhempleado->nombre }} {{ $provincia->rrhempleado->apellido }}</td>
                                            <td>{{ $provincia->sueldo }}</td>
                                            <td>{{ $provincia->horasextras }}</td>
                                            <td>{{ $provincia->comisiones }}</td>
                                            <td>{{ $provincia->dialaborales }}</td>
                                            <td>{{ $provincia->liquido }}</td>
                                            <td>{{ $provincia->prestamosquirogramaiess }}</td>
                                            <td>{{ $provincia->descuentosinternet }}</td>
                                            
                                            <td>{{ $provincia->aporteiess }}</td>
                                            <td>{{ $provincia->prestamosyanticipos }}</td>
                                            <td>{{ $provincia->totaldescuentos }}</td>
                                            <td>


                                                <div class="form-button-action">
                                                    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip"
                                                        data-original-title="Editar"
                                                        href="{{ route('provincias.editar', $provincia->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection


@section('scripts')
    <script>
    
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

            if ("{{$buscarfinal}}"===""){
                document.getElementById('fechafinal').value = ano + "-" + mes + "-" + dia;
            }
       
        $('#fechafinal').change(function() {
            if($('#fechafinal').val() <$('#fechainicial').val()){
                $('#fechafinal').val('');
                swal("Información!", "Ingresar fecha final mayor a fecha inicial", {
						icon : "info",
						buttons: {        			
							confirm: {
								className : 'btn btn-info'
							}
						},
					});
            }
        }); 
        $('#fechainicial').change(function() {
            if($('#fechafinal').val() < $('#fechainicial').val()){
                $('#fechainicial').val('');
                swal("Información!", "Ingresar fecha inicial menor a fecha final", {
						icon : "info",
						buttons: {        			
							confirm: {
								className : 'btn btn-info'
							}
						},
					});
            }
            //$('#cdaorecinto').val(cliente.cdaorecinto);

        });
   

    </script>
@endsection
