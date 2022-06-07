<?php

namespace App\Models\listadocobro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\contratosclientes\Cclicontratocliente;

class Listacobro extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function cclicontratocliente(){
        return $this->belongsTo(Cclicontratocliente::class);
    }
}
