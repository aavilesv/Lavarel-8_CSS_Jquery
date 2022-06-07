<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecompra extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function compra(){
        return $this->belongsTo(Compra::class);
    }
    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }
}
