<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;

    protected $table = 't_requerimiento';

    protected $fillable = [
        'id_requerimiento',
        'id_empresa',
        'id_sucursal',
        'id_empleado',
        'id_empleado_aprobador',
        'id_estados',
        'nro_requerimiento',
        'fecha_emision',
        'fecha_creacion',
        'es_activo',
        'es_eliminado',
        'usuario_modificacion',
        'fecha_modificacion',
        'usuario_creacion',
        'fecha_creacion'
    ];

    protected $primaryKey = 'id_requerimiento';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado');
    }

    public function requerimientosDetalle()
    {
        return $this->hasMany(RequerimientoDetalle::class, 'id_requerimiento', 'id_requerimiento');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estados', 'id_estados');
    }
    public function articulo()
    {
    return $this->belongsTo(Articulo::class, 'id_articulo');
    }
}
