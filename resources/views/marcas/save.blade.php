<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div class="text">
                <ul class="list-inline">
                    <li class="list-inline-item"> <i class="fab fa-ioxhost"></i></li>
                    <li class="list-inline-item">
                        <h3> <strong class="card-title"> {{ $action }} Marca </strong>
                        </h3>
                    </li>
                </ul>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form @if ($action === 'Nuevo') action="{{ route('marca.store') }}" @else action="{{ route('marca.update', $marca->id) }}" @endif method="POST" class="form-control">
                @if ($action === 'Editar') @method('put') @endif
                @csrf
                <div class="form-group">
                    <label for="nombres">Nombre:</label>
                    <input type="text" name="nombres"  required class="form-control" placeholder="Nombre" @if ($action === 'Nuevo') value="{{ old('nombres') }}" @else value="{{ old('nombres', $marca->nombres) }}" @endif>
                    @error('nombres')
                        <div class="alert alert-danger" role="alert">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <div class="form-check">
                    <label>Estado</label><br/>
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="status" value="0"  
                        @if ($action=== "Editar") @if ($marca->status=== 0)  checked="" @endif  @endif>
                        <span class="form-radio-sign">Inactivo</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="status" 
                        value="1"  @if ($action=== "Editar") @if ($marca->status=== 1)  checked="" @endif  @endif @if ($action=== "Nuevo")  checked=""   @endif>
                        <span class="form-radio-sign">Activo</span>
                    </label>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                        class="fas fa-reply"></i>
                    Volver</a>
                    <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i class="fas fa-save"></i>
                        Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
</script>
