<?php

namespace App\Contracts;

use App\Models\Consulta;

interface NotificadorInterface
{
    public function notificar(Consulta $consulta): void;
}
