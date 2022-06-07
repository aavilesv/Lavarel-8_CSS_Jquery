<div class="form-button-action">
    <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip" data-original-title="Imprimir registro" target="_blank"
        href="{{ route('pdfnovedad.novedadgetone', $id) }}"><i class="icon-printer"></i></a>
    <a class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Editar"
        href="{{ route('novedadupdatecontroller.edit', $id) }}"><i class="fa fa-edit"></i></a>
    @if ($eliminar == 1)
        <a class="btn btn-link btn-warning btn-eliminar" data-toggle="tooltip" data-original-title="Eliminar Novedad"
            data-json='{"id":"{{ $id }}"}' rel="action"><i class="fas fa-times"></i></a>
    @endif

</div>
