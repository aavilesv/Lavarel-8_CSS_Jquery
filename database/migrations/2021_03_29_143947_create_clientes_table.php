<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // soporte
        Schema::create('provincias', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('name', 50)->unique(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cantons', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('name', 50)->unique(); //varchar 255
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')
                ->references('id')
                ->on('provincias')
                ->onDelete('cascade');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar


        });

        Schema::create('clientes', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 50); //varchar 255
            $table->string('apellido', 50); //varchar 255
            //$table->string('cedula', 13)->unique(); //varchar 255
            $table->string('cedula', 13)->default('000000')->nullable(); //varchar 255
            $table->date('fechanacimiento')->nullable();
            $table->string('email', 60)->nullable(); //varchar 255
            $table->boolean('estado')->default(1);
            $table->boolean('estadocivil')->default(1);
            $table->boolean('sexo')->default(1);
            $table->boolean('eliminar')->default(1);
            $table->string('ffoto')->default('')->nullable(); //varchar 255
            $table->string('fotocedula2')->default('')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });


        // recursos humanos
        Schema::create('rrhareas', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 50); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhcargos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 50); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhprofesions', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 60); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });



        Schema::create('rrhempleados', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 50); //varchar 255
            $table->string('apellido', 50); //varchar 255
            $table->string('cedula', 10)->unique(); //varchar 255
            $table->date('fechanacimiento');
            $table->string('direccion', 80); //varchar 255
            $table->string('cdaorecinto', 80); //varchar 255
            $table->string('contacto', 10); //varchar 255
            $table->string('contacto1', 10)->nullable(); //varchar 255
            $table->string('email', 60); //varchar 255
            $table->string('licencia', 60)->nullable(); //varchar 255
            $table->date('fechaingreso'); //varchar 255
            $table->double('sueldo', 8, 2); //varchar 255


            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')
                ->references('id')
                ->on('cantons')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rrharea_id');
            $table->foreign('rrharea_id')
                ->references('id')
                ->on('rrhareas')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rrhcargo_id');
            $table->foreign('rrhcargo_id')
                ->references('id')
                ->on('rrhcargos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rrhprofesion_id');
            $table->foreign('rrhprofesion_id')
                ->references('id')
                ->on('rrhprofesions')
                ->onDelete('cascade');

            $table->boolean('sexo')->default(1);
            $table->boolean('estado')->default(1);
            $table->boolean('eliminar')->default(1);
            $table->string('ffoto')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });


        Schema::create('rrhtipocontratos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhcontratos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200); //varchar 255
            $table->unsignedBigInteger('rrhempleado_id');
            $table->foreign('rrhempleado_id')
                ->references('id')
                ->on('rrhempleados')
                ->onDelete('cascade');

            $table->unsignedBigInteger('rrhtipocontrato_id');
            $table->foreign('rrhtipocontrato_id')
                ->references('id')
                ->on('rrhtipocontratos')
                ->onDelete('cascade');
            $table->string('archivo')->nullable(); //varchar 255
            $table->double('sueldo', 8, 2); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhcargafamiliars', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 200); //varchar 255
            $table->string('parentezco', 200); //varchar 255
            $table->date('fechanacimiento'); //varchar 255
            $table->unsignedBigInteger('rrhempleado_id');
            $table->foreign('rrhempleado_id')
                ->references('id')
                ->on('rrhempleados')
                ->onDelete('cascade');
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('rrhasistencias', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->date('fecha')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->time('horaentrada')->nullable();
            $table->time('horasalidaalmuerzo')->nullable(); //varchar 255
            $table->time('horaentralmuezo')->nullable(); //varchar 255
            $table->time('horasalida')->nullable();; //varchar 255
            $table->unsignedBigInteger('rrhempleado_id');
            $table->foreign('rrhempleado_id')
                ->references('id')
                ->on('rrhempleados')
                ->onDelete('cascade');
            $table->boolean('estado')->default(1);
            $table->time('totalhoras')->nullable();
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('nominapagos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('sueldo')->default('')->nullable(); //varchar 255
            $table->string('horasextras')->default('')->nullable();
            $table->string('comisiones')->default('')->nullable(); //varchar 255
            $table->string('dialaborales')->default('')->nullable(); //varchar 255
            $table->string('liquido')->default('')->nullable(); //varchar 255

            $table->string('prestamosquirogramaiess')->default('')->nullable(); //varchar 255
            $table->string('descuentosinternet')->default('')->nullable();
            $table->string('aporteiess')->default('')->nullable(); //varchar 255
            $table->string('prestamosyanticipos')->default('')->nullable(); //varchar 255
            $table->string('totaldescuentos')->default('')->nullable(); //varchar 255
            $table->unsignedBigInteger('rrhempleado_id');
            $table->foreign('rrhempleado_id')
                ->references('id')
                ->on('rrhempleados')
                ->onDelete('cascade');
            $table->boolean('estado')->default(1);
            $table->string('archivo')->default('')->nullable();
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });


        Schema::create('cclicontratotipoclientes', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cclicontratoclientes', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('contratocodigo')->default('00000')->nullable();
            $table->string('documentocodigo')->default('00000')->nullable();

            $table->date('fecha')->default(DB::raw('NOW()'))->nullable();
            $table->string('direccion', 100); //varchar 255
            $table->string('cdaorecinto', 150); //varchar 255
            $table->string('sector', 150); //varchar 255
            $table->string('tipodevivienda', 150); //varchar 255
            $table->string('gps', 255)->default('')->nullable(); //varchar 255
            $table->string('latitud')->default('')->nullable();
            $table->string('longitud')->default('')->nullable();

            $table->string('contacto', 10); //varchar 255
            $table->string('contacto1', 10)->default('0000000000')->nullable(); //varchar 255

            $table->unsignedBigInteger('cclicontratotipocliente_id');
            $table->foreign('cclicontratotipocliente_id')
                ->references('id')
                ->on('cclicontratotipoclientes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')
                ->references('id')
                ->on('cantons')
                ->onDelete('cascade');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->string('rnombre', 100)->default('Sin Dato')->nullable(); //varchar 255
            $table->string('rapellido', 100)->default('Sin Dato')->nullable(); //varchar 255
            $table->string('rparantesco', 100)->default('Sin Valor')->nullable(); //varchar 255
            $table->string('rcelular', 10)->default('0000000000')->nullable();

            $table->string('nombre', 100)->default('Sin Dato')->nullable(); //varchar 255
            $table->string('apellido', 100)->default('Sin Dato')->nullable(); //varchar 255
            $table->string('parantesco', 100)->default('Sin Valor')->nullable(); //varchar 255
            $table->string('celular', 10)->default('0000000000')->nullable();


            $table->string('tipodeservicio')->default(1);
            $table->boolean('servicio')->default(1);
            $table->string('anchodebanda')->default(1);
            $table->string('comportacion')->default(1);
            $table->string('modalidadequipo')->default(1);
            $table->unsignedBigInteger('tarifa')->default(23)->nullable();

            $table->string('ffoto')->default('')->nullable(); //varchar 255
            $table->string('archivo')->default('')->nullable();
            $table->boolean('eliminar')->default(1);
            $table->boolean('promocion')->default(0);

            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('novedads', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->dateTime('horainciar'); //varchar 255
            $table->date('fechavisita')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->time('horavisita')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->boolean('novedadopercance');
            $table->unsignedBigInteger('cclicontratocliente_id');
            $table->foreign('cclicontratocliente_id')
                ->references('id')
                ->on('cclicontratoclientes')
                ->onDelete('cascade');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
            $table->text('especificar')->nullable();

            $table->string('nombre', 255)->default('Sin Dato')->nullable(); //varchar 255
            $table->string('parentesco', 100)->default('Sin Dato')->nullable(); //varchar 255
            $table->string('tecnico', 255)->default('0000000000')->nullable(); //varchar 255
            $table->string('celular', 10)->default('0000000000')->nullable();

            $table->boolean('estado')->default(1);
            $table->boolean('eliminar')->default(1);
        });


        Schema::create('soporteradios', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->boolean('cantena')->nullable(); //varchar 255
            $table->boolean('crouter')->nullable(); //varchar 255
            $table->boolean('ccambiowiffi')->nullable(); //varchar 255
            $table->boolean('cfrecuencias')->nullable(); //varchar 255
            $table->string('cap', 100)->nullable(); //varchar 255
            $table->string('cip', 100)->nullable(); //varchar 255
            $table->string('cred', 100)->nullable(); //varchar 255
            $table->boolean('aanterior')->nullable(); //varchar 255
            $table->boolean('arouter')->nullable(); //varchar 255
            $table->string('accq')->nullable(); //varchar 255
            $table->string('aseñal')->nullable();
            $table->boolean('iconectores')->nullable();
            $table->boolean('irouter')->nullable();
            $table->boolean('ipoe')->nullable();
            $table->string('inconectores')->nullable();
            $table->string('imarcadelrouter')->nullable();
            $table->string('iantenaanterior')->nullable();
            $table->string('iantenanueva')->nullable();
            $table->string('imetroscable')->nullable();
            $table->boolean('itubogalvanizado')->nullable();
            $table->boolean('icable')->nullable();
            $table->boolean('iadicionocaña')->nullable();
            $table->boolean('ituboaluminio')->nullable();
            $table->unsignedBigInteger('novedad_id');
            $table->foreign('novedad_id')
                ->references('id')
                ->on('novedads')
                ->onDelete('cascade');
            $table->date('fecha')->nullable();
            $table->string('usuario')->nullable();
            $table->time('horallegada')->nullable();
            $table->time('horasalida')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('nombre', 200)->default('Sin Dato')->nullable();
            $table->string('nombreresponsable', 200)->default('Sin Dato')->nullable();
            $table->string('parentescoresponsable', 200)->default('Sin Dato')->nullable();

            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar

        });


        Schema::create('soportefibras', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->boolean('conu')->nullable(); //varchar 255
            $table->boolean('crouter')->nullable(); //varchar 255
            $table->boolean('ccambiowiffi')->nullable(); //varchar 255
            $table->boolean('arouter')->nullable(); //varchar 255
            $table->string('idbm')->nullable();
            $table->string('iupc')->nullable();
            $table->string('iapc')->nullable();
            $table->string('iodb')->nullable();
            $table->boolean('iconectores')->nullable();
            $table->boolean('irouter')->nullable();
            $table->boolean('icablered')->nullable();
            $table->string('inconectores')->nullable();
            $table->string('inmarcadelrouter')->nullable();
            $table->string('ionunueva')->nullable();
            $table->string('imetroscable')->nullable();
            $table->string('ionuanterior')->nullable();
            $table->boolean('icablefibra')->nullable();
            $table->unsignedBigInteger('novedad_id');
            $table->foreign('novedad_id')
                ->references('id')
                ->on('novedads')
                ->onDelete('cascade');
            $table->string('nombre', 200)->default('Sin Dato')->nullable();
            $table->date('fecha')->nullable();
            $table->string('usuario')->nullable();
            $table->string('nombreresponsable', 200)->default('Sin Dato')->nullable();
            $table->string('parentescoresponsable', 200)->default('Sin Dato')->nullable();
            $table->time('horallegada')->nullable();
            $table->time('horasalida')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar

        });

        Schema::create('proveedors', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('nombres', 70)->default('Sin Valor')->nullable(); //varchar 255
            $table->string('direccion', 80)->default('Sin Valor')->nullable(); //varchar 255
            $table->string('cedula', 13)->default('0000000')->nullable(); //varchar 255
            $table->string('email', 50)->default('@')->nullable(); //varchar 255
            $table->boolean('status')->default('1')->nullable(); //varchar 255
            $table->string('telefono', 10)->default('0000000')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('marcas', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('nombres', 60)->default('')->nullable(); //varchar 255
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('articulos', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('nombres', 60)->default('')->nullable(); //varchar 255
            $table->text('descripcion')->default('')->nullable(); //varchar 255
            $table->string('image', 200)->default('')->nullable(); //varchar 255
            $table->bigInteger('sotck')->default(0)->nullable();
            $table->bigInteger('existencia')->default(0)->nullable();
            $table->bigInteger('cajanumero')->default(1)->nullable();
            $table->bigInteger('cajaunidad')->default(1)->nullable();
            $table->boolean('status')->default('1')->nullable(); //varchar 255
            $table->double('precio', 8, 2)->default(0)->nullable(); //varchar 255
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });




        Schema::create('inventarios', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('factura', 50)->default('00000')->nullable(); //varchar 255
            $table->date('fecha')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->text('descripcion')->default('')->nullable(); //varchar 255
            $table->bigInteger('incial')->default(0)->nullable();
            $table->bigInteger('ingreso')->default(0)->nullable();
            $table->bigInteger('articulosalida')->default(0)->nullable();
            $table->bigInteger('existencia')->default(0)->nullable();
            $table->string('usercrear', 50)->default('Aún sin dato')->nullable(); //varchar 255
            $table->string('usermodifica', 50)->default('Aún sin dato')->nullable(); //varchar 255
            $table->double('precio', 8, 2)->default(0)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });



        Schema::create('compras', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('factura', 50)->default('00000')->nullable(); //varchar 255
            $table->double('iva', 8, 2)->default(0)->nullable(); //varchar 255
            $table->date('fecha')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->double('subtotal', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('total', 8, 2)->default(0)->nullable(); //varchar 255
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('cascade');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
            $table->boolean('status')->default(1)->nullable(); //varchar 255

        });


        Schema::create('detallecompras', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->bigInteger('cantidad')->default(0)->nullable();
            $table->double('precio', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('totalprecio', 8, 2)->default(0)->nullable(); //varchar 255

            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compras');
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar

        });
        Schema::create('salidas', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('factura', 50)->default('00000')->nullable(); //varchar 255
            $table->date('fecha')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->text('accion')->default('')->nullable(); //varchar 255
            $table->bigInteger('cantidad')->default(0)->nullable();
            $table->string('codigo', 50)->default('0000000000')->nullable(); //varchar 255
            $table->string('codig', 6)->default('000000')->nullable(); //varchar 255
            $table->string('cliente', 80)->default('Aún sin dato')->nullable(); //varchar 255
            $table->string('articulo', 80)->default('Aún sin dato')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('listacobros', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->unsignedBigInteger('cclicontratocliente_id');
            $table->foreign('cclicontratocliente_id')->references('id')->on('cclicontratoclientes');
            $table->string('red',30)->default('')->nullable(); //varchar 255
            $table->date('fechainstalacion')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->date('fechamensualminima')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->date('fechamensualmaximo')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->date('fechacortado')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->string('abonadopedientedescuentos',100)->default('')->nullable(); //varchar 255
            $table->double('valorabonadopendientedescuentos', 8, 2)->default(0)->nullable(); //varchar 255
            $table->string('compromisopagosuspenciondeservicio',100)->default('')->nullable(); //varchar 255
            $table->date('fechacompromiso')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->text('observacion')->default('sin dato')->nullable(); //varchar 255
            $table->string('usuariocreador', 100)->default('sin dato')->nullable(); //varchar 255
            $table->string('usuariomodificar', 100)->default('sin dato')->nullable(); //varchar 255
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cuentasporcobrars', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->unsignedBigInteger('cclicontratocliente_id');
            $table->foreign('cclicontratocliente_id')->references('id')->on('cclicontratoclientes');
            $table->double('saldo', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('valorpagado', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('abonado', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('sumatotal', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('abonadoanterior', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('saldoanterior', 8, 2)->default(0)->nullable(); //varchar 255
            $table->string('usuariomodificar', 100)->default('sin dato')->nullable(); //varchar 255
            $table->date('fecha')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->boolean('eliminar')->default(0)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('detallecuentasporcobrars', function (Blueprint $table) {

            $table->id(); //interger  sin signo increment 
            $table->unsignedBigInteger('cuentasporcobrar_id');
            $table->foreign('cuentasporcobrar_id')->references('id')->on('cuentasporcobrars');
            $table->string('recibo')->default('00000')->nullable(); //varchar 255
            $table->string('online')->default('Online')->nullable(); //varchar 255
            $table->string('factura')->default('Vacío')->nullable(); //varchar 255
            $table->string('observacion')->default('Vacío')->nullable(); //varchar 255
            $table->string('banco')->default('Vacío')->nullable(); //varchar 255
            $table->string('documento')->default('Vacío')->nullable(); //varchar 255
            $table->date('fechadeposito')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->double('valorpagado', 8, 2)->default(0)->nullable(); //varchar 255
            $table->string('fechaapagar')->default('Vacío')->nullable(); //varchar 255
            $table->string('archivo')->default('Vacío')->nullable(); //varchar 255
            $table->string('parentezco')->default('Familiar')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cajas', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->date('fecha')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->double('saldocaja', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('cajaprincipal', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('cajafinal', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('saldoingeniero', 8, 2)->default(0)->nullable(); //varchar 255
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cajadetalles', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->unsignedBigInteger('cuentasporcobrar_id');
            $table->foreign('cuentasporcobrar_id')->references('id')->on('cuentasporcobrars');
            $table->date('fechainicio')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->date('fechafinal')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->double('monto', 8, 2)->default(0)->nullable(); //varchar 255
            $table->double('abonado', 8, 2)->default(0)->nullable(); //varchar 255
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->string('usuariocreado', 100)->default('')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cajaextras', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200)->default('')->nullable(); //varchar 
            $table->string('nombre', 200)->default('')->nullable(); //varchar 
            $table->string('ingresapor', 200)->default('')->nullable(); //varchar 
            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->double('monto', 8, 2)->default(0)->nullable(); //varchar 255
            $table->string('observacion')->default('')->nullable();
            $table->string('factura', 50)->default('')->nullable();
            $table->string('recibo', 50)->default('')->nullable();
            $table->string('online', 50)->default('')->nullable();
            $table->string('image')->default('')->nullable();
            $table->string('usuariocreado', 100)->default('')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('gastocajas', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200)->default('')->nullable(); //varchar 
            $table->string('nombre', 200)->default('')->nullable(); //varchar 
            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->double('monto', 8, 2)->default(0)->nullable(); //varchar 255
            $table->string('image', 200)->default('')->nullable(); //varchar 255
            $table->string('observacion', 100)->default('')->nullable(); //varchar 255
            $table->string('factura', 100)->default('')->nullable(); //varchar 255
            $table->string('soporte', 100)->default('')->nullable(); //varchar 255
            $table->string('usuariocreado', 100)->default('')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('promocions', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('titulo', 60)->default('')->nullable(); //varchar 255
            $table->text('descripcion')->default('')->nullable(); //varchar 255
            $table->date('fechainicio')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->date('fechafinal')->default(DB::raw('NOW()'))->nullable(); //varchar 255
            $table->boolean('servicio')->default(1)->nullable(); //varchar 255
            $table->unsignedBigInteger('contratocliente')->default(0)->nullable();
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('promociondetalles', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->unsignedBigInteger('promocion_id');
            $table->foreign('promocion_id')->references('id')->on('promocions');
            $table->unsignedBigInteger('cclicontratocliente_id');
            $table->foreign('cclicontratocliente_id')->references('id')->on('cclicontratoclientes');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('planes', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('foto')->default('')->nullable();
            $table->string('descripcion', 100)->default('')->nullable();
            $table->double('valor', 8, 2)->default(0)->nullable(); //varchar 255
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('pagepromocions', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('foto')->default('')->nullable();
            $table->boolean('status')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('quiensomos', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->text('descripcion')->default('')->nullable();
            $table->string('mision')->default('')->nullable();
            $table->string('vision')->default('')->nullable();
            $table->string('foto')->default('')->nullable();
            $table->text('objetivos')->default('')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('equipotrabajopages', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('profesion')->default('')->nullable();
            $table->string('nombre')->default('')->nullable();
            $table->string('area')->default('')->nullable();
            $table->string('facebook')->default('')->nullable();
            $table->string('instagram')->default('')->nullable();
            $table->string('twitter')->default('')->nullable();
            $table->string('linkenin')->default('')->nullable();
            $table->string('foto')->default('')->nullable();
            $table->boolean('objetivos')->default(1)->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
        Schema::create('serviciospages', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('nombre')->default('')->nullable();
            $table->string('descripcion')->default('')->nullable();
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviciospages');
        Schema::dropIfExists('equipotrabajopages');
        Schema::dropIfExists('quiensomos');
        Schema::dropIfExists('pagepromocions');
        Schema::dropIfExists('planes');
        // promociones
        Schema::dropIfExists('promociondetalles');
        Schema::dropIfExists('promocions');
        // cuentas por cobrar

        Schema::dropIfExists('gastocajas');
        Schema::dropIfExists('cajaextras');
        Schema::dropIfExists('cajadetalles');
        Schema::dropIfExists('cajas');

        // cuentas por cobrar
        Schema::dropIfExists('detallecuentasporcobrars');
        
        Schema::dropIfExists('cuentasporcobrars');
        Schema::dropIfExists('listacobros');
        /// compras e inventario
        Schema::dropIfExists('salidas');
        Schema::dropIfExists('detallecompra');
        Schema::dropIfExists('compras');
        Schema::dropIfExists('inventarios');
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('proveedors');

        // soporte
        Schema::dropIfExists('soportefibras');
        Schema::dropIfExists('soporteradios');
        Schema::dropIfExists('novedads');
        // contratos clientes
        Schema::dropIfExists('cclicontratoclientes');
        Schema::dropIfExists('cclicontratotipoclientes');
        // recursos
        Schema::dropIfExists('rrhcargafamiliars');
        Schema::dropIfExists('rrhcontratos');
        Schema::dropIfExists('rrhtipocontrato');

        Schema::dropIfExists('rrhempleado');
        Schema::dropIfExists('rrhprofesions');
        Schema::dropIfExists('rrhcargos');
        Schema::dropIfExists('rrhareas');
        // cliente
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('cantons');
        Schema::dropIfExists('provincias');
    }
}
