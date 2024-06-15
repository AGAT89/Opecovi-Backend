<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'm_almacen';
    protected $fillable = [
        'id_almacen',
        'id_empresa',
        'id_sucrusal',
        'cod_almacen',
        'nomb_almacen',
        'direccion',
        'ubigeo',
        'telefono',
        'es_activo',
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion',
    ];

    protected $primaryKey = 'id_almacen';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal');
    }
}
