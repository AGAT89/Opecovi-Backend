<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'm_empresa';

    protected $fillable = [
        'id_empresa',
        'cod_empresa',
        'nomb_empresa',
        'ruc',
        'direccion',
        'telefono',
        'es_activo',
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $primaryKey = 'id_empresa';
    public $timestamps = false; // Deshabilitar timestamps

    public function areas()
    {
        return $this->hasMany(Area::class, 'id_empresa', 'id_empresa');
    }

    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'id_empresa', 'id_empresa');
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_empresa', 'id_empresa');
    }

    public function modulos()
    {
        return $this->hasMany(Modulo::class, 'id_empresa', 'id_empresa');
    }

    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'id_empresa', 'id_empresa');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'id_empresa', 'id_empresa');
    }

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'id_empresa', 'id_empresa');
    }

    public function roles()
    {
        return $this->hasMany(Rol::class, 'id_empresa', 'id_empresa');
    }

    public function sucursales()
    {
        return $this->hasMany(Sucursal::class, 'id_empresa', 'id_empresa');
    }

    public function requerimientos()
    {
        return $this->hasMany(Requerimiento::class, 'id_empresa', 'id_empresa');
    }

    public function requerimientosDetalle()
    {
        return $this->hasMany(RequerimientoDetalle::class, 'id_empresa', 'id_empresa');
    }
    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'id_empresa', 'id_empresa');
    }
}
