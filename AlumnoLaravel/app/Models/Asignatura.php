<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asignatura extends Model
{
    public function profesor(): BelongsTo{
        return $this->belongsTo(Profesor::class);
    }
}
