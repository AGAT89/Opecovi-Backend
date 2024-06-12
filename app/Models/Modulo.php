<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'm_modulo';

    protected $fillable = [
        'id_modulo',
        'id_empresa',
        'cod_modulo',
        'nomb_modulo',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion',
        'es_activo',
        'es_eliminado',
        'path',
        'icon'
    ];

    protected $primaryKey = 'id_modulo';
    public $timestamps = false; // Deshabilitar timestamps

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }
}
