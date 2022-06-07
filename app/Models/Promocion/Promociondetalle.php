<?php

namespace App\Models\Promocion;
use App\Models\contratosclientes\Cclicontratocliente;
use App\Models\Promocion\Promocion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociondetalle extends Model
{
    use HasFactory;
    protected  $guarded= [];

    public function cclicontratocliente(){
        return $this->belongsTo(Cclicontratocliente::class);
    }
    public function promocion(){
        return $this->belongsTo(Promocion::class);
    }
}
