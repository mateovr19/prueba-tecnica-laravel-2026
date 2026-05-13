<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'especie', 'raza', 'peso', 'fecha_nacimiento', 'propietario_id'];

    public function propietario(): BelongsTo
    {
        return $this->belongsTo(Propietario::class);
    }
}
