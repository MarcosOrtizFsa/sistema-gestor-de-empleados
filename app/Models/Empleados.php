<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
      protected $table = 'empleados';

        protected $fillable = [
            'nombre',
            'apellido',
            'correo',
            'domicilio',
            'dni',
            'celular',
        ];
}


