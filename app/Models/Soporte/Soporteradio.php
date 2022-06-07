<?php

namespace App\Models\Soporte;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporteradio extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function novedad(){
        return $this->belongsTo(Novedad::class);
    }
}
