<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 't_cotizacion';

    protected $fillable  = [
        'id_cotizacion', 
        'id_empresa', 
        'id_sucursal', 
        'id_solicitud_compra', 
        'id_proveedor', 
        'id_empleado', 
        'id_empleado_aprobacion', 
        'nro_cotizacion', 
        'fecha_cotizacion', 
        'fecha_solicitud_compra', 
        'fecha_aprobacion', 
        'imp_neto', 
        'imp_base_isc', 
        'imp_isc', 
        'es_activo', 
        'es_eliminado', 
        'imp_base_igv', 
        'imp_igv', 
        'imp_cobrar', 
        'usuario_creacion', 
        'fecha_creacion', 
        'usuario_modificacion', 
        'fecha_modificacion',

    ];
    protected $primaryKey = 'id_cotizacion';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }



}
