<?php

namespace App\Models\Cobro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cobro\Caja;
class Cajaextra extends Model
{
 
    use HasFactory;
    protected  $fillable= 
    [
       'descripcion','nombre','ingresapor','caja_id','monto','observacion','factura','recibo','online','usuariocreado'
    ];
    public function caja(){
        return $this->belongsTo(Caja::class);
    }
}
