<?php

namespace App\Models\Cobro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastocaja extends Model
{
    use HasFactory;
    protected  $fillable= 
    [
       'descripcion','nombre','caja_id','monto','observacion','factura','soporte','usuariocreado'
    ];
    public function caja(){
        return $this->belongsTo(Caja::class);
    }
}
