<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;
use App\Http\Resources\ConsultaResource;
use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Services\ConsultaService;

class ExerciseIntermediateController extends Controller
{
    public function __construct(private ConsultaService $service){}

    public function index(Request $request)
    {
       $consultas = $this->service->paginar($request->query('estado'));
       return ConsultaResource::collection($consultas);
    }

    public function store(StoreConsultaRequest $request)
    {
        $consulta = $this->service->crear($request->validated());
        return (new ConsultaResource($consulta))->response()->setStatusCode(201);
    }

    public function show($id)
    {
        $consulta = $this->service->encontrar($id);
        return new ConsultaResource($consulta);
    }

    public function update(UpdateConsultaRequest $request, Consulta $consulta)
    {
        $consulta = $this->service->actualizar($consulta, $request->validated());
        return new ConsultaResource($consulta);
    }

    public function destroy(Consulta $consulta)
    {
        $this->service->eliminar($consulta);
        return response()->json(null, 204);
    }
}
