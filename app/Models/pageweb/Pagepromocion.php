<?php

namespace App\Models\pageweb;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagepromocion extends Model
{
    use HasFactory;
    protected  $guarded= 
    [
        'status','created_at'
        ,'updated_at'
     ];
}
