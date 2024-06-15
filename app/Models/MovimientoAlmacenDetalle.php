<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class MovimientoAlmacenDetalle extends Model
{
    use HasFactory;

    protected $table = 't_movimiento_almacen_detalle';

    protected $fillabel = [
        'id_movimiento_almacen_detalle',
        'id_empresa',
        'id_sucursal',
        'id_movimiento_almacen',
        'id_articulo',
        'cant_movimiento_almacen',
        'imp_neto',
        'imp_base_isc',
        'imp_isc',
        'imp_base_igv',
        'imp_igv',
        'imp_cobra',
        'saldo_fisico',
        'saldo_valor',
        'usuario_creacion',
        'fecha_creacion',
    ];

    protected $primaryKey = 'id_movimiento_almacen_detalle';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id_articulo', 'id_articulo');
    }

}
