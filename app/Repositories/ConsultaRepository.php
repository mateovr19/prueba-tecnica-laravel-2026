<?php

namespace App\Repositories;

use App\Models\Consulta;

class ConsultaRepository implements ConsultaRepositoryInterface
{
    private const RELACIONES = ['mascota.propietario', 'veterinario', 'tratamientos'];

    public function paginar(?string $estado)
    {
        return Consulta::with(self::RELACIONES)
            ->when($estado, fn($query) => $query->where('estado', $estado))
            ->paginate(10);
    }

    public function encontrar(int $id): Consulta
    {
        return Consulta::with(self::RELACIONES)->findOrFail($id);
    }

    public function crear(array $data): Consulta
    {
        return Consulta::create($data);
    }

    public function actualizar(Consulta $consulta, array $data): Consulta
    {
        $consulta->update($data);
        return $consulta->load(self::RELACIONES);
    }

    public function eliminar(Consulta $consulta): void
    {
        $consulta->delete();
    }
}
