<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['motivo','diagnostico', 'tratamiento', 'veterinario_id', 'mascota_id', 'estado', 'fecha_consulta'];

    public function veterinario(): BelongsTo
    {
        return $this->belongsTo(Veterinario::class);
    }

    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class);
    }

    public function tratamientos(): HasMany
    {
        return $this->hasMany(Tratamiento::class);
    }
}
