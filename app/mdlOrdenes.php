<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdlOrdenes extends Model
{
    protected $table = 'ordenes'; 
    protected $fillable = ['comida','cantidad','sugerencias','subtotal','img'];  
}
