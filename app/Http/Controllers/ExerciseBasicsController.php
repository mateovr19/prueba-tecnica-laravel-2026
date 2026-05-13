<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Http\Requests\StoreMascotaRequest;
use App\Http\Requests\UpdateMascotaRequest;

class ExerciseBasicsController extends Controller
{
    public function getAllPets()
    {
        $data = Mascota::with('propietario')->paginate(15);
        return response()->json($data, 200);
    }

    public function save(StoreMascotaRequest $request)
    {
        $mascota = Mascota::create($request->validated());
        $mascota->load('propietario');
        return response()->json($mascota, 201);
    }

    public function getPet($id)
    {
        $mascota = Mascota::with('propietario')->findOrFail($id);

        return response()->json($mascota);
    }

    public function deletePet($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();

        return response()->json(null, 204);
    }

    public function updatePet($id, UpdateMascotaRequest $request)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->validated());
        $mascota->load('propietario');

        return response()->json($mascota);
    }
}
