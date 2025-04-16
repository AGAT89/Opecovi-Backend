<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['mensaje', 'id_usuario'];
    public $timestamps = true;
}