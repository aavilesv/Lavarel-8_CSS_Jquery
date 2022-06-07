<?php

namespace App\Models\nominapagos;

use App\Models\recursoshumanos\Rrhempleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominapago extends Model
{
    use HasFactory;
    protected  $fillable= 
    [
       'sueldo','horasextras','comisiones','dialaborales','liquido'
       ,'prestamosquirogramaiess','descuentosinternet','aporteiess','prestamosyanticipos','totaldescuentos',
       'rrhempleado_id','estado'
    ];
    public function rrhempleado(){
        return $this->belongsTo(Rrhempleado::class);
    }
}
