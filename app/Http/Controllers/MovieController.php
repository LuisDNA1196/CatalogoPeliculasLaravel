<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    // GET /api/movies  -> todos los registros
    public function index()
{
    // Devuelve todas las películas ordenadas por fecha (opcional)
    return \App\Models\Movie::orderBy('created_at', 'desc')->get();
}


    // GET /api/movies/{movie} -> un registro por id
    public function show(Movie $movie): JsonResponse
    {
        return response()->json($movie, 200);
    }

    // POST /api/movies -> crear un registro
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'synopsis' => ['required', 'string'],
            'year'     => ['required', 'integer', 'between:1888,2100'],
            'cover'    => ['required','string','max:255'],
        ]);

        $movie = Movie::create($validated);

        return response()->json([
            'message' => 'Movie updated  successfully',
            'data'    => $movie,
        ], 201);
    }
    public function update(Request $request, Movie $movie): JsonResponse
{
    // Validar los datos que vienen en la petición PUT
    $validated = $request->validate([
        'title'    => ['required','string','max:255'],
        'synopsis' => ['required','string'],
        'year'     => ['required','integer','between:1888,2100'],
        'cover'    => ['required','string','max:255'],
    ]);

    // Actualizar el registro
    $movie->update($validated);

    // Devolver respuesta JSON
    return response()->json([
        'message' => 'Movie updated successfully',
        'data'    => $movie->refresh(),
    ], 200);
}
    // DELETE /api/movies/{movie}
public function destroy(Movie $movie): JsonResponse
{
    $movie->delete();

    // 204 = No Content
    return response()->json(null, 204);
}
}
