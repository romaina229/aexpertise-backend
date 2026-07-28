<?php

namespace App\Http\Controllers\Api;

use App\Models\Formation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(Request $request)
    {
        $query = Formation::where('is_active', true);

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        if ($request->has('limit')) {
            $query->limit($request->limit);
        }

        $formations = $query->orderBy('start_date', 'asc')->get();

        // Formater les données pour le frontend
        $formations = $formations->map(function ($formation) {
            return $this->formatFormation($formation);
        });

        return response()->json($formations);
    }

    public function show($id)
    {
        $formation = Formation::with('registrations')->findOrFail($id);
        return response()->json($this->formatFormation($formation));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string',
            'price' => 'required|string',
            'category' => 'required|string',
            'level' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'max_participants' => 'required|integer|min:1',
            'objectives' => 'nullable|array',
            'program' => 'nullable|array',
            'prerequisites' => 'nullable|string'
        ]);

        // S'assurer que objectives et program sont des tableaux
        if (isset($validated['objectives']) && is_array($validated['objectives'])) {
            $validated['objectives'] = json_encode($validated['objectives']);
        }
        if (isset($validated['program']) && is_array($validated['program'])) {
            $validated['program'] = json_encode($validated['program']);
        }

        $formation = Formation::create($validated);
        return response()->json($this->formatFormation($formation), 201);
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::findOrFail($id);
        
        $data = $request->all();
        
        // S'assurer que objectives et program sont des tableaux
        if (isset($data['objectives']) && is_array($data['objectives'])) {
            $data['objectives'] = json_encode($data['objectives']);
        }
        if (isset($data['program']) && is_array($data['program'])) {
            $data['program'] = json_encode($data['program']);
        }

        $formation->update($data);
        return response()->json($this->formatFormation($formation));
    }

    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);
        $formation->delete();
        return response()->json(null, 204);
    }

    // Méthode privée pour formater les données
    private function formatFormation($formation)
    {
        return [
            'id' => $formation->id,
            'title' => $formation->title,
            'description' => $formation->description,
            'duration' => $formation->duration,
            'price' => $formation->price,
            'category' => $formation->category,
            'level' => $formation->level,
            'image' => $formation->image,
            'is_active' => $formation->is_active,
            'start_date' => $formation->start_date,
            'end_date' => $formation->end_date,
            'max_participants' => $formation->max_participants,
            'current_participants' => $formation->current_participants,
            'objectives' => $this->ensureArray($formation->objectives),
            'program' => $this->ensureArray($formation->program),
            'prerequisites' => $formation->prerequisites,
            'created_at' => $formation->created_at,
            'updated_at' => $formation->updated_at,
        ];
    }

    private function ensureArray($value)
    {
        if (is_null($value)) {
            return [];
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : [];
        }
        if (is_array($value)) {
            return $value;
        }
        return [];
    }
}
