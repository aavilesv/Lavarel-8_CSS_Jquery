<?php

namespace App\Models\Soporte;


use App\Models\contratosclientes\Cclicontratocliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    public function cclicontratocliente(){
        return $this->belongsTo(Cclicontratocliente::class);
    }

    protected $casts = [
        'horainciar' => 'datetime:d-m-Y H:i',
        ];
        
}
