<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'm_empleado';

    protected $fillable = [
        'id_empleado',
        'id_empresa',
        'id_persona',
        'id_area',
        'id_cargo',
        'es_activo',
        'es_eliminado',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion',
        'usuario_creacion'
    ];

    protected $primaryKey = 'id_empleado';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id_cargo');
    }
}
