<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table= 'Actividad';
    protected $fillable = ['nombre'];
}
