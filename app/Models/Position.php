<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'area_id',
        'cod_cargo',
        'nombre_cargo',
        'es_activo',
        'es_eliminado'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
