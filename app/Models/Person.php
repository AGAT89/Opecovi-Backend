<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'peoples';

    protected $fillable = [
        'tipo_persona',
        'tipo_documento',
        'documento_identidad',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'direccion',
        'ubigeo',
        'telefono',
        'es_empleado',
        'es_proveedor',
        'es_activo',
        'es_eliminado'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
