<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item"> <i class="fab fa-ioxhost"></i></li>
                    <li class="list-inline-item">
                        <h3> <strong class="card-title">Salida</strong>
                        </h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form @if ($action === 'Nuevo') action="{{ route('LocalInventario.store') }}" @else action="{{ route('marca.update', $salida->id) }}" @endif method="POST" class="form-control form-createe">
                @if ($action === 'Editar') @method('put') @endif
                @csrf
                <div class="form-group">
                    
                    @if ($action === 'Nuevo') 
                    <label for="cliente_id">Clientes o Instalaciones equipos:</label>
                    <select class="chosen-select form-control input-border-bottom cliente_id" 
                     id="cliente_iddd" required
                        name="cliente_id">
                       
                         <option value="" selected disabled hidden>Seleccione un Nombre-Cedula</option>
                        
                         <option value="Instalaciones en postes o en caja">
                             Instalaciones en postes o en caja
                          </option>
                         @foreach ($clientes as $cliente)
                         <option value="{{ $cliente->id }}">
                             {{ $cliente->nombre }}
                             {{ $cliente->apellido }} :
                             {{ $cliente->cedula }}
                         </option>
                     @endforeach
                    </select>
                    @else 
                    <label for="factura">Cliente o Instalaciones:</label>
                    <input type="text"  onKeyPress="return validar(event)" required class="form-control" placeholder="Factura" @if ($action === 'Nuevo') 
                    value="{{ old('nombres') }}" @else value="{{ old('nombres', $salida->cliente) }}" @endif>
                  

                    @endif
                </div>
           
                <div class="form-group">
                    @if ($action === 'Nuevo') 
                    <label for="articulo" class="control-label">Articulo:</label>

                    <select class="chosen-select form-control input-border-bottom"
                     required id="cbarticulo" name="articulo">
                     
                        <option value="" selected disabled hidden>Seleccione un articulo</option>
                        @foreach ($articulo as $articul)
                            <option value="{{ $articul->id }}">
                                {{ $articul->marca->nombres }} , {{ $articul->nombres }} </option>
                        @endforeach
                      

                    </select>
                    @else
                    
                    <label for="factura">Articulo:</label>
                    <input type="text"  onKeyPress="return validar(event)" required class="form-control" placeholder="Factura" @if ($action === 'Nuevo') 
                    value="{{ old('nombres') }}" @else value="{{ old('nombres', $salida->articulo) }}" @endif>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="nombres">Descripción:</label>
                    @if ($action === 'Nuevo') 
                    <textarea  name="accion" class="form-control" required rows="3" 
                    placeholder="Describir el uso del articulo"></textarea>
                    @else 
                    
                    <textarea  name="accion" class="form-control" required rows="3" 
                    placeholder="Describir el uso del articulo">{{ $salida->accion }}</textarea>
                    @endif
                  
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="factura">Factura:</label>
                            <input type="text" name="factura" required class="form-control" placeholder="Factura" @if ($action === 'Nuevo') 
                            value="00000" @else value="{{ old('nombres', $salida->factura) }}" @endif>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cantidad">Stock:</label>
                            <input 
                            @if ($action === 'Nuevo')  type="number"  name="cantidad"  value="" 
                            @else  type="text" onKeyPress="return validar(event)" value="{{ old('nombres', $salida->cantidad) }}" @endif
                            min="1" max="2000" required class="form-control"  placeholder="Nombre">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="codigo">Codigo:</label>
                            <input type="text"    minlength="1" maxlength="15" required class="form-control" 
                            placeholder="Codigo" @if ($action === 'Nuevo') name="codigo"  value="{{ old('nombres') }}"
                             @else onKeyPress="return validar(event)"  value="{{ old('nombres', $salida->codigo) }}" @endif>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="codig">Ultimo 4 Códigos:</label>
                            <input type="text"  name="codig"  minlength="1" maxlength="6" required class="form-control"  placeholder="Ultimos 4 Digitos del codigo" @if ($action === 'Nuevo') 
                             value="{{ old('nombres') }}" @else onKeyPress="return validar(event)" 
                             value="{{ old('nombres', $salida->codig) }}" @endif>
                        </div>
                    </div>
                </div>

                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('marca.index') }}" class="btn btn-danger btn-border btn-round mr-2"><i
                            class="fas fa-reply"></i>
                        Cancelar</a>
                    <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i class="fas fa-save"></i>
                        Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.chosen-select').select2();

    $('.form-createe').submit(function(e) {
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
</script>
