<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'm_proveedor';

    protected $fillable = [
        'id_proveedor',
        'id_empresa',
        'id_persona',
        'giro_negocio',
        'es_activo',
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $primaryKey = 'id_proveedor';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }
}
