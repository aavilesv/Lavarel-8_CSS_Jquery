<?php

namespace App\Models\Soporte;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soportefibra extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function novedad(){
        return $this->belongsTo(Novedad::class);
    }
}
