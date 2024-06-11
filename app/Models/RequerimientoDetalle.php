<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequerimientoDetalle extends Model
{
    use HasFactory;

    protected $table = 't_requerimiento_detalle';

    protected $fillable = [
        'id_requerimiento_detalle',
        'id_empresa',
        'id_requerimiento',
        'id_articulo',
        'cant_solicitada',
        'cant_atendida',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $primaryKey = 'id_requerimiento_detalle';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function requerimiento()
    {
        return $this->belongsTo(Empresa::class, 'id_requerimiento', 'id_requerimiento');
    }
}
