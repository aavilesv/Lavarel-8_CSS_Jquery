<div class="form-button-action">
    
    @if ($eliminar === 0)
    <a class="btn btn-link btn-success btn-lg" data-toggle="tooltip" data-original-title="Ver"
        href="{{ route('cuentasporcobrar.show', $id) }}"><i class="fa fa-eye"></i></a>
        <a class="btn btn-link btn-danger btn-eliminar" data-toggle="tooltip" data-original-title="Eliminar"
            data-json='{"id":"{{ $id }}"}' rel="action"><i class="fa fa-times"></i></a>
    @endif

</div>
