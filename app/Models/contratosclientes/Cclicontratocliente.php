<?php

namespace App\Models\contratosclientes;

use App\Models\Cliente;
use App\Models\Cliente\Canton;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cclicontratocliente extends Model
{
    use HasFactory;
    protected  $fillable= 
    [
      'contratocodigo','documentocodigo', 'direccion','cdaorecinto','sector','tipodevivienda','gps'
       ,'latitud','longitud','contacto','contacto1','cclicontratotipocliente_id','canton_id','cliente_id'
        ,'rnombre','rapellido','rparantesco','rcelular','nombre','apellido','parantesco','celular',
        'tipodeservicio','servicio','anchodebanda','comportacion','modalidadequipo','tarifa','eliminar','promocion'];
    public function canton(){
        return $this->belongsTo(Canton::class);
    }
    
    public function cclicontratotipocliente(){
        return $this->belongsTo(Cclicontratotipocliente::class);
    }
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
