<?php

namespace App\Models\recursoshumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rrhcontrato extends Model
{
    use HasFactory;
    protected  $fillable= 
    [
       'descripcion','rrhempleado_id','rrhtipocontrato_id','sueldo','estado'
    ];
    public function rrhtipocontrato(){
        return $this->belongsTo(Rrhtipocontrato::class);
    }
    public function rrhempleado(){
        return $this->belongsTo(Rrhempleado::class);
    }
}
