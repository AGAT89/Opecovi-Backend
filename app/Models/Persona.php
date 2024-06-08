<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'm_persona';

    protected $fillable = [
        'id_persona',
        'id_empresa',
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
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $primaryKey = 'id_persona';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }
}
