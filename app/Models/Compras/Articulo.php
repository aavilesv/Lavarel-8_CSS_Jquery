<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected  $fillable= 
    [
       'nombres','descripcion','sotck','existencia','cajanumero','cajaunidad','status','precio','marca_id'
    ];
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
