<?php

namespace App\Models\Cuentascobrar;

use App\Models\cuentascobrar\Cuentasporcobrar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecuentasporcobrar extends Model
{
    use HasFactory;
    protected  $guarded= [];
    public function cuentasporcobrar(){
        return $this->belongsTo(Cuentasporcobrar::class);
    }
}
