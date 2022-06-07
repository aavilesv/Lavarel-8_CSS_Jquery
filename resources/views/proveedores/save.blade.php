<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item"> <i class="fab fa-ioxhost"></i>
                    </li>
                    <li class="list-inline-item">
                        <h3> <strong class="card-title"> {{ $action }} Proveedor </strong></h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form @if ($action === 'Nuevo') action="{{ route('proveedor.store') }}" @else action="{{ route('proveedor.update', $proveedor->id) }}" @endif method="POST" class="form-control" enctype="multipart/form-data">
                @if ($action === 'Editar') @method('put') @endif
                @csrf
              
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" name="nombres" maxlength="70" required class="form-control" placeholder="Nombre:requerido" @if ($action === 'Nuevo') value="{{ old('nombres') }}" @else value="{{ old('nombres', $proveedor->nombres) }}" @endif>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" maxlength="80"  class="form-control" placeholder="Dirección:no requerido" @if ($action === 'Nuevo') value="{{ old('direccion') }}" @else value="{{ old('direccion', $proveedor->direccion) }}" @endif>
                </div>
                <div class="form-group">
                    <label for="cedula">Ruc-Cédula:</label>
                    <input type="text" name="cedula" maxlength="13" onKeyPress="return soloNumeros(event)" class="form-control" placeholder="Cédula:no requerido" @if ($action === 'Nuevo') value="{{ old('cedula') }}" @else value="{{ old('cedula', $proveedor->cedula) }}" @endif>
                </div>
                
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" maxlength="10" onKeyPress="return soloNumeros(event)" class="form-control" placeholder="Telefono:no requerido" @if ($action === 'Nuevo') value="{{ old('cedula') }}" @else value="{{ old('cedula', $proveedor->telefono) }}" @endif>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" maxlength="50"  class="form-control" placeholder="Email:no requerido" @if ($action === 'Nuevo') value="{{ old('email') }}" @else value="{{ old('email', $proveedor->email) }}" @endif>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                        class="fas fa-reply"></i>
                    Volver</a>
                    <button id="btn-registrar" class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                            class="fas fa-save"></i>
                        Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

</script>
