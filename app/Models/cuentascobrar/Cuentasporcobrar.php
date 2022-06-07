<?php

namespace App\Models\cuentascobrar;

use App\Models\contratosclientes\Cclicontratocliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentasporcobrar extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function cclicontratocliente(){
        return $this->belongsTo(Cclicontratocliente::class);
    }
}
