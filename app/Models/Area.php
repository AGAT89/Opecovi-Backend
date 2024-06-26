<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'm_area';

    protected $fillable = [
        'id_area',
        'id_empresa',
        'cod_area',
        'nomb_area',
        'centro_costos',
        'es_activo',
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $primaryKey = 'id_area';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'id_area', 'id_area');
    }
}
