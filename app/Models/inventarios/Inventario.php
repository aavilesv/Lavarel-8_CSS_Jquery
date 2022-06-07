<?php

namespace App\Models\inventarios;

use App\Models\Compras\Articulo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected  $guarded= [];

    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }
}
