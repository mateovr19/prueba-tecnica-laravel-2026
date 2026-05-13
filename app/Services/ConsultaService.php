<?php

namespace App\Services;

use App\Contracts\NotificadorInterface;
use App\Models\Consulta;
use App\Repositories\ConsultaRepositoryInterface;

class ConsultaService
{
    public function __construct(
        private ConsultaRepositoryInterface $consultaRepository,
        private NotificadorInterface $notificador
        )
    {}

    public function paginar(?string $estado)
    {
        return $this->consultaRepository->paginar($estado);
    }

    public function encontrar(int $id): Consulta
    {
        return $this->consultaRepository->encontrar($id);
    }

    public function crear(array $data): Consulta
    {
        $data['estado'] = 'pendiente';
        $consulta = $this->consultaRepository->crear($data);
        $this->notificador->notificar($consulta);
        return $consulta;
    }

    public function actualizar(Consulta $consulta, array $data): Consulta
    {
        $consulta = $this->consultaRepository->actualizar($consulta, $data);
        $this->notificador->notificar($consulta);
        return $consulta;
    }

    public function eliminar(Consulta $consulta)
    {
        return $this->consultaRepository->eliminar($consulta);
    }
}
