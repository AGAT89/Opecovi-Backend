<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable  = [
        'people_id',
        'area_id',
        'position_id',
        'es_activo',
        'es_eliminado'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
