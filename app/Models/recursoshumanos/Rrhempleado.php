<?php

namespace App\Models\recursoshumanos;

use App\Models\Cliente\Canton;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rrhempleado extends Model
{
    use HasFactory;
    protected  $fillable= 
    [
       'nombre','apellido','cedula','fechanacimiento','direccion'
       ,'cdaorecinto','licencia','contacto','contacto1','fechaingreso','sueldo'
       ,'rrharea_id','rrhcargo_id','rrhprofesion_id','sexo'
        ,'email','canton_id','estado','eliminar'
    ];
    // aqui solo vas a poner valores como eliminar o estado// protegidos 
    //protected  $guarded= [];
    public function canton(){
        return $this->belongsTo(Canton::class);
    }

    public function rrhcargo(){
        return $this->belongsTo(Rrhcargo::class);
    }
    public function rrhprofesion(){
        return $this->belongsTo(Rrhprofesion::class);
    }

    public function rrharea(){
        return $this->belongsTo(Rrharea::class);
    }


}
