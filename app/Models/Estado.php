<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'm_estados'; 
    protected $primaryKey = 'id_estados';

    protected $fillable = [
        'id_estados',
        'id_empresa',
        'nomb_tabla',
        'codigo_estado',
        'nomb_estados',
        'es_activo',
        'es_eliminado',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];


    public $timestamps = false;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

}
