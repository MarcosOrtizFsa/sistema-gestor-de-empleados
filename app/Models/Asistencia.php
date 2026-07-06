<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empleados;

class Asistencia extends Model
{
    protected $table = 'asistencias';

    protected $fillable = [
        'empleado_id',
        'fecha',
        'hora_entrada',
        'hora_salida',
        'estado',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'empleado_id');
    }
}