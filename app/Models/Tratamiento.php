<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tratamiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['descripcion', 'consulta_id', 'dosis', 'duracion'];

    public function consulta(): BelongsTo
    {
        return $this->belongsTo(Consulta::class);
    }
}
