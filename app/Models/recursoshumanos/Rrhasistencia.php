<?php

namespace App\Models\recursoshumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Rrhasistencia extends Model
{
    use HasFactory;
    protected  $guarded= [];
    /*
    protected $fillable = [
        'fecha',
        'horaentrada',
        'horasalidaalmuerzo',
        'horaentralmuezo',
        'horasalida',
        'estado',
        'totalhoras',
        'created_at',
        'updated_at',
        'rrhempleado_id',
    ];*/
    public function rrhempleado(){
        return $this->belongsTo(Rrhempleado::class);
    }
    protected $dates = ['name_field'];

    function suma_horas($hora1,$hora2){
 
        $hora1=explode(":",$hora1);
        $hora2=explode(":",$hora2);
        $temp=0;
     
        //sumo segundos 
        $segundos=(int)$hora1[2]+(int)$hora2[2];
        while($segundos>=60){
            $segundos=$segundos-60;
            $temp++;
        }
     
        //sumo minutos 
        $minutos=(int)$hora1[1]+(int)$hora2[1]+$temp;
        $temp=0;
        while($minutos>=60){
            $minutos=$minutos-60;
            $temp++;
        }
     
        //sumo horas 
        $horas=(int)$hora1[0]+(int)$hora2[0]+$temp;
     
        if($horas<10)
            $horas= '0'.$horas;
     
        if($minutos<10)
            $minutos= '0'.$minutos;
     
        if($segundos<10)
            $segundos= '0'.$segundos;
     
        $sum_hrs = $horas.':'.$minutos.':'.$segundos;
     
        return ($sum_hrs);
     
        }


}
