<?php

namespace App\Models\Cobro;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cobro\Caja;
use App\Models\cuentascobrar\Cuentasporcobrar;

class Cajadetalle extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function cuentasporcobrar(){
        return $this->belongsTo(Cuentasporcobrar::class);
    }
    public function caja(){
        return $this->belongsTo(Caja::class);
    }
}
