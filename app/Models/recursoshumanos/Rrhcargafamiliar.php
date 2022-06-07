<?php

namespace App\Models\recursoshumanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rrhcargafamiliar extends Model
{
    use HasFactory;
    public function rrhempleado(){
        return $this->belongsTo(Rrhempleado::class);
    }
}
