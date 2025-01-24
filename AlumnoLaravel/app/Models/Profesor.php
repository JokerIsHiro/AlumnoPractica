<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profesor extends Model
{
    public function asignatura(): HasOne {
        return $this->hasOne(Asignatura::class);
    }
    public function alumno(): HasMany{
        return $this->hasMany(Alumno::class);
    }
}
