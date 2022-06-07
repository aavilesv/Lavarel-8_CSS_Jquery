
<?php $__env->startSection('metadatos'); ?>
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Registar Compra'); ?>
<?php $__env->startSection('content'); ?>


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="flaticon-shopping-bag"></i> Registrar</h1>
                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Compra</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0"></div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">

                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">

                                    <i class="fas fa-address-card"> Formulario</i>
                                    <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                                </div>

                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="form-group">
                                        <label for="nombre">#Factura:</label>
                                        <input id="factura" name="factura" type="text" class="form-control" minlength="2"
                                            maxlength="20" onKeyPress="return soloNumeros(event)" value='00000'>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">

                                                <i class="fas fa-user"></i> Proveedor
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>Buscar por:</strong></h5>

                                            <div class="form-group">
                                                <label for="proveedor_id">Ruc o
                                                    nombre:</label>

                                                <select class="chosen-select form-control list" id="pproveedor"
                                                    name="proveedor_id" data-placeholder="Seleccione Proveedor">
                                                    <option value="" selected disabled hidden>Seleccione un Ruc
                                                        o Nombre</option>
                                                    <?php $__currentLoopData = $proveedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($proveedo->id); ?>"
                                                            data-cjson='{"nombre":"<?php echo e($proveedo->nombres); ?>","telefono":"<?php echo e($proveedo->telefono); ?>",
                                                                                    "direc":"<?php echo e($proveedo->direccion); ?>","email":"<?php echo e($proveedo->email); ?>"}'>
                                                            <?php echo e($proveedo->cedula); ?> :
                                                            <?php echo e($proveedo->nombres); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Proveedor:</label>
                                                <input id="nombre" name="nombre" type="text"
                                                    style="background-color: white;" disabled class="form-control" value=''>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="telefono">Telefono:</label>
                                                        <input id="telefono" name="telefono" type="text" disabled
                                                            class="form-control" style="background-color: white;"
                                                            minlength="4" maxlength="30" value='' required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input id="email" name="email" type="text"
                                                            style="background-color: #f9f9f9;" disabled
                                                            style="background-color: white;" class="form-control"
                                                            data-val="true" value=''>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="direccion" class="control-label mb-1">Dirección:</label>
                                                <input id="direccion" name="direccion" type="text"
                                                    style="background-color: #f9f9f9;" disabled class="form-control"
                                                    value='' required="true">
                                            </div>



                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">

                                                <i class="flaticon-delivery-truck"></i> Articulo
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <form id="frm-additem" class="from-control">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <button class="btn btn-primary form-control" id="btn-agregar"
                                                                placeholder="">
                                                                <i class="glyphicon glyphicon-plus">Insertar</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"></div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="articulo" class="control-label mb-1">Articulo:</label>

                                                    <select class="chosen-select form-control list" id="cbarticulo"
                                                        name="articulo" data-placeholder="Seleccione articulo">
                                                        <option value="" selected disabled hidden>Seleccione un
                                                            articulo</option>
                                                        <?php $__currentLoopData = $articulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($articul->id); ?>"
                                                                data-ajson='{"id":"<?php echo e($articul->id); ?>","precio":"<?php echo e($articul->precio); ?>"
                                                                            ,"image":"<?php echo e($articul->image); ?>","stock":"<?php echo e($articul->sotck); ?>","cajanumero":"<?php echo e($articul->cajanumero); ?>"
                                                                            ,"cajaunidad":"<?php echo e($articul->cajaunidad); ?>"}'>
                                                                <?php echo e($articul->marca->nombres); ?> ,
                                                                <?php echo e($articul->nombres); ?> </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label for="cajanumero"
                                                                    class="control-label mb-1">#Caja:</label>
                                                                <span class="hint--bottom-left  hint--info"
                                                                    aria-label="Insertar cantidad">
                                                                    <input id="cajanumero" name="cajanumero" type="number"
                                                                        class="form-control valid" value='1' min="1"
                                                                        required></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cajaunidad" class="control-label mb-1">Cantidad
                                                                    en Caja por unidad:</label>
                                                                <span class="hint--bottom-left  hint--info"
                                                                    aria-label="Insertar cantidad">
                                                                    <input id="cajaunidad" name="cajaunidad" type="number"
                                                                        class="form-control valid" data-val="true" value='3'
                                                                        min="1" required="true"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label for="stock" class="control-label mb-1">Cantidad
                                                                    Total:</label>
                                                                <span class="hint--bottom-left  hint--info"
                                                                    aria-label="Insertar cantidad">
                                                                    <input id="art-cantidad" name="stock" type="number"
                                                                        style="background-color: #f9f9f9;"
                                                                        class="form-control valid" disabled data-val="true"
                                                                        value='' min="0" required="true"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="precio"
                                                                    class="control-label mb-1">Precio($):</label>
                                                                <input id="art-precio" name="precio" type="text"
                                                                    style="background-color: #f9f9f9;" 
                                                                    class="form-control valid" data-val="true" value=''
                                                                    required="true">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="imagen" class="control-label mb-1">Imagen:</label>
                                                        <span class="hint--top-left  hint--info" aria-label="Ver imagen">
                                                            <div class="pull-bottom image">
                                                                <a href="/media/46871.jpeg" id="ref"
                                                                    data-lightbox="mygallery" data-title="">
                                                                    <img src="/media/46871.jpeg" id="image"
                                                                        class="img-fluid center" alt="Responsive image"
                                                                        style="width:100px; height:100px;"></a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--aqui loco--->
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-shopping-bag"></i> Detalle de Articulo</div>
                        <div class="card-category">Articulos</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <div class="table-responsive">
                                <table class="display table table-striped 
                                                                    table-hover table-head-bg-primary">
                                    <thead>
                                        <tr class="table-info">
                                            <th>
                                                Nombre
                                            </th>
                                            <th>

                                                Precio
                                            </th>
                                            <th>

                                                Cantidad
                                            </th>
                                            <th>

                                                Unidad en Caja
                                            </th>
                                            <th>

                                                #Caja
                                            </th>
                                            <th>
                                                Total
                                            </th>
                                            <th COLSPAN=3 class="col-xs-1">
                                                <i class="fa fa-cog" aria-hidden="true">
                                                    Acción</i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tdetalle">
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <button id="btn-registrar" class="btn btn-success" type="submit">
                                                <span id="loading" class="fa fa-save"></span>
                                                <span id="caption"><strong>Registrar
                                                    </strong></span>
                                            </button>
                                            <button type="button" class="btn btn-danger" id="cancelar"
                                                onclick="window.location='<?php echo e(route('compra.index')); ?>'">
                                                <span class="icon-reload"> </span>
                                                Cancelar
                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="table-responsive">
                                            <table cellspacing="0" width="100%"
                                                class="table table-striped table-bordered table-advance table-hover display nowrap">
                                                <tbody class="col-lg-12">
                                                    <tr>
                                                        <td>

                                                            <div class="form-group">
                                                                <label for="id_mtotal" class="control-label mb-1"><strong>
                                                                        Total a
                                                                        Pagar($):</strong></label>
                                                                <input id="id_mtotal" name="id_mtotal" type="text"
                                                                    style="background-color: #f9f9f9;" disabled
                                                                    class="form-control valid" placeholder="0.00"
                                                                    required="true">
                                                                <span class="help-block field-validation-valid"
                                                                    data-valmsg-for="cc-name"
                                                                    data-valmsg-replace="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#pproveedor').change(function() {
            var cliente = $('#pproveedor option:selected').data('cjson');
            $('#nombre').val(cliente.nombre);
            $('#telefono').val(cliente.telefono);
            $('#direccion').val(cliente.direc);
            $('#email').val(cliente.email);
        });
        $('#cbarticulo').change(function() {
            var option = $('#cbarticulo option:selected');
            if (option.val() != '') {
                var articulo = option.data('ajson');
                $('#art-cantidad').val(1);
                $('#cajanumero').val(articulo.cajanumero);
                $('#cajaunidad').val(articulo.cajaunidad);
                $('#art-precio').val(articulo.precio);
                var URLdomain = window.location.host;
                $('#art-cantidad').val(stocktotal(articulo.cajanumero, articulo.cajaunidad));
                $('#image').attr("src", "http://" + URLdomain + articulo.image);
                $('#ref').attr("href", "http://" + URLdomain + articulo.image);
            } else {
                $('#art-cod').val('');
                $('#art-cantidad').val('');
                $('#art-precio').val('');
            }
        });
        $("#cajaunidad").mouseleave(function(e) {
            $('#art-cantidad').val(stocktotal($('#cajaunidad').val(), $('#cajanumero').val()));
        });

        $("#cajanumero").mouseleave(function(e) {
            $('#art-cantidad').val(stocktotal($('#cajanumero').val(), $('#cajaunidad').val()));
        });
        $('#cajanumero').mouseenter(function(event) {
            $('#art-cantidad').val(stocktotal($('#cajanumero').val(), $('#cajaunidad').val()));

        });
        $('#cajaunidad').mouseenter(function(event) {
            $('#art-cantidad').val(stocktotal($('#cajaunidad').val(), $('#cajanumero').val()));

        });

        function stocktotal(number, nuevo) {
            return number * nuevo;
        }

        $("#art-precio").numeric({ decimalPlaces: 2 });
        $('#frm-additem').submit(function(e) {

            if ($('#pproveedor').val()) {


                if ($('#cbarticulo').val()) {
                    e.preventDefault();
                    var option = $('#cbarticulo option:selected');
                    var cantidad = parseInt($('#art-cantidad').val());
                    var cajanumero = parseInt($('#cajanumero').val());
                    var cajaunidad = parseInt($('#cajaunidad').val());
                    var data = option.data('ajson');
                    var item = new Object();
                    item.id = data.id;

                    item.precio = parseFloat($('#art-precio').val());
                    item.descripcion = option.text();
                    item.cajanumero = cajanumero;
                    item.cajaunidad = cajaunidad;
                    item.cantidad = cantidad;
                    app.add(item);

                } else {
                    swal({
                        title: "Información!",
                        text: "Ingrese un articulo",
                        icon: "info",
                        buttons: {
                            confirm: {
                                text: "Confirmar",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                    return false;
                }

            } else {
                swal({
                    title: "Información!",
                    text: 'Ingresar Proveedor',
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Confirmar",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
                return false;
            }
        });
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token]").val()
            }
        });
       
        $('#btn-registrar').click(function() {
            if (app.compra.items.length > 0 && app.compra.total > 0) {
                if ($('#factura').val().length != 0) {


                    if ($('#pproveedor').val()) {

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
                                app.compra.cliente = $('#pproveedor').val();
                                app.compra.factura = $('#factura').val();
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo e(route('compra.store')); ?>',
                                    data: JSON.stringify(app.compra),
                                    dataType: 'json',
                                    success: function(data) {
                                        swal(""+JSON.stringify(data), {
  buttons: false,
  timer: 5000,
});
   window.location.reload();
                                    }
                                });

                            } else {

                            }
                        });


                    } else {

                        swal({
                            title: "Información!",
                            text: 'Debe Seleccionar Proveedor',
                            icon: "info",
                            buttons: {
                                confirm: {
                                    text: "Confirmar",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-success",
                                    closeModal: true
                                }
                            }
                        });

                    }


                } else {
                    swal({
                        title: "Información!",
                        text: 'No debe estar en cero el #factura',
                        icon: "info",
                        buttons: {
                            confirm: {
                                text: "Confirmar",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                }
            } else {

                swal({
                    title: "Información!",
                    text: 'Debe Seleccionar Articulos al Detalle',
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Confirmar",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });


            }
        });
        var app = {
            compra: {
                //cabecera
                fecha: '',
                cliente: 0,
                factura: 0,
                subtotal: 0,
                total: 0,
                //detalle
                items: []
            },
            add: function(item) {
                if (!this.existe(item)) {
                var iva = 0.12;
                item.subtotal = item.cantidad * item.precio;
                item.total = (item.subtotal) * iva + item.subtotal;
                this.compra.items.push(item);
                 }
                this.actualizar();
                this.presentar();

                return true;
            },
            eliminar: function(id) {
                for (var i in this.compra.items) {
                    if (this.compra.items[i].id == id) {
                        this.compra.items.splice(i, 1);
                        this.actualizar();
                        this.presentar();
                        return true;
                    }
                }
                return false;
            },
                        existe: function(item) {
                            for (var i in this.compra.items) {
                                if (item.id == this.compra.items[i].id) {
                                    
                                    this.compra.items[i].cajanumero += item.cajanumero;
                                    this.compra.items[i].cajaunidad += item.cajaunidad;
                                    this.compra.items[i].cantidad = this.compra.items[i].cajanumero*this.compra.items[i].cajaunidad;
                                    this.compra.items[i].precio = item.precio;
                                    
                                    this.compra.items[i].subtotal = this.compra.items[i].cantidad * item.precio;
                                    this.compra.items[i].total = (this.compra.items[i].subtotal) + this.compra.items[i].iva;
                                    return true;
                                }
                            }
                            return false;
                        },

            sumar: function(id, precio) {
                for (var i in this.compra.items) {
                    if (id == this.compra.items[i].id) {

                        this.compra.items[i].cantidad += 1;
                        this.compra.items[i].precio = precio;
                        this.compra.items[i].subtotal = this.compra.items[i].cantidad * precio;
                        this.compra.items[i].total = (this.compra.items[i].subtotal) + this.compra.items[i].iva;

                        this.actualizar();
                        this.presentar();

                        return true;
                    }
                }
                return false;
            },

            restar: function(id, precio) {
                for (var i in this.compra.items) {
                    if (id == this.compra.items[i].id) {
                        if (this.compra.items[i].cantidad > 1) {
                            this.compra.items[i].cantidad -= 1;
                            this.compra.items[i].precio = precio;
                            this.compra.items[i].subtotal = this.compra.items[i].cantidad * precio;
                            this.compra.items[i].total = (this.compra.items[i].subtotal) + this.compra.items[i].iva;
                            this.actualizar();
                            this.presentar();
                        }
                        return true;
                    }
                }
                return false;
            },

            actualizar: function() {
                this.compra.subtotal = 0;
                this.compra.descuento = 0;
                this.compra.total = 0;
                for (var item of this.compra.items) {
                    this.compra.subtotal += item.subtotal;
                    this.compra.total += item.subtotal;
                }

                $('#id_mtotal').val(this.compra.total.toFixed(2));
            },
            presentar: function() {
                $('#tdetalle').html('');
                for (var item of this.compra.items) {
                    var tr = '<tr>';

                    tr += '<td id="des">' + item.descripcion + '</td>';
                    tr += '<td>$' + item.precio + '</td>';
                    tr += '<td>' + item.cantidad + '</td>';
                    tr += '<td>' + item.cajanumero + '</td>';
                    tr += '<td>' + item.cajaunidad + '</td>';
                    tr += '<td>$' + item.subtotal + '</td>';
                    /*tr += '<td class=""><button onclick="app.restar(' + item.id + ',' + item.precio +
                        ')"  title="Restar"class="btn btn-icon btn-round btn-warning"><i class="fas fa-minus"></i> </button></td>';
                    tr += '<td class=""><button onclick="app.sumar(' + item.id + ',' + item.precio +
                        ')"  title="Sumar +1"class="btn btn-icon btn-round btn-success"><i class="fas fa-plus"></i> </button></td>';*/
                    tr += '<td class=""><button onclick="app.eliminar(' + item.id +
                        ')"  title="Eliminar"class="btn btn-icon btn-round btn-danger"><i class="fas fa-trash-alt"></i> </button></td>';

                    tr += '</tr>';
                    $('#tdetalle').append(tr);
                }
            },
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\nuevoxampp\htdocs\app\AppQuantika\resources\views/compras/save.blade.php ENDPATH**/ ?>