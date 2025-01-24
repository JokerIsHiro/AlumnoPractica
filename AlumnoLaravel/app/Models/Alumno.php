<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alumno extends Model
{
    public function asignatura(): HasMany{
        return $this->hasMany(Alumno::class);
    }
    public function profesor(): HasMany{
        return $this->hasMany(Profesor::class);
    }
}
