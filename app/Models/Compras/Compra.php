<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    
}
