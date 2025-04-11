<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'm_articulo';

    protected $fillable  = [
        'id_articulo',
        'id_empresa',
        'cod_articulo',
        'nomb_articulo',
        'unidad_medida',
        'contenido_articulo',
        'peso_articulo',
        'volumen_articulo',
        'stock_minimo',
        'stock_maximo',
        'tipo_articulo',
        'cod_barra_articulo',
        'es_activo',
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $primaryKey = 'id_articulo';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'id_almacen', 'id_almacen');
    }

    public function movimientos()
    {
        return $this->hasMany(MovimientoAlmacenDetalle::class, 'id_articulo', 'id_articulo');
    }
}
