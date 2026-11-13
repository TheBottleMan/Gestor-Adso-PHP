<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAprendizRequest;
use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    // LISTAR Y BUSCAR APRENDICES
    public function index(Request $request)
    {
        // Obtenemos el texto de búsqueda.
        $q = trim((string) $request->query('q', ''));

        // Consultamos los aprendices.
        $aprendices = Aprendiz::query()

            // Aplicamos el filtro solamente si hay búsqueda.
            ->when($q !== '', function ($query) use ($q) {

                $query->where(function ($subquery) use ($q) {

                    $subquery
                        ->where('nombre', 'like', "%{$q}%")
                        ->orWhere('documento', 'like', "%{$q}%");

                });

            })

            // Ordenamos del más reciente al más antiguo.
            ->latest()

            // Mostramos diez registros por página.
            ->paginate(10)

            // Conservamos los parámetros de búsqueda.
            ->withQueryString();

        return view(
            'aprendices.index',
            compact('aprendices', 'q')
        );
    }


    // MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        $aprendiz = new Aprendiz();

        return view(
            'aprendices.create',
            compact('aprendiz')
        );
    }


    // GUARDAR NUEVO APRENDIZ
    public function store(StoreUpdateAprendizRequest $request)
    {
        Aprendiz::create($request->validated());

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz creado correctamente.');
    }


    // MOSTRAR FORMULARIO DE EDICIÓN
    public function edit(Aprendiz $aprendiz)
    {
        return view(
            'aprendices.edit',
            compact('aprendiz')
        );
    }


    // ACTUALIZAR APRENDIZ
    public function update(
        StoreUpdateAprendizRequest $request,
        Aprendiz $aprendiz
    ) {
        $aprendiz->update($request->validated());

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz actualizado correctamente.');
    }


    // ELIMINAR APRENDIZ
    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz eliminado correctamente.');
    }
}