<?php

namespace App\Repositories;

use App\Models\Consulta;

interface ConsultaRepositoryInterface
{
    public function paginar(?string $estado);
    public function encontrar(int $id): Consulta;
    public function crear(array $data): Consulta;
    public function actualizar(Consulta $consulta, array $data): Consulta;
    public function eliminar(Consulta $consulta): void;
}
