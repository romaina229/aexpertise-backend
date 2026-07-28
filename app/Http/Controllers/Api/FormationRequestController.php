<?php

namespace App\Http\Controllers\Api;

use App\Models\FormationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormationRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'organization' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'formation' => 'required|string|max:255',
            'participants' => 'nullable|integer|min:1',
            'budget' => 'nullable|string',
            'message' => 'nullable|string'
        ]);

        $formationRequest = FormationRequest::create([
            ...$validated,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Demande de formation envoyée avec succès',
            'request' => $formationRequest
        ], 201);
    }

    public function index()
    {
        $requests = FormationRequest::latest()->get();
        return response()->json($requests);
    }

    public function show($id)
    {
        $request = FormationRequest::findOrFail($id);
        return response()->json($request);
    }

    public function update(Request $request, $id)
    {
        $formationRequest = FormationRequest::findOrFail($id);
        $formationRequest->update($request->all());
        return response()->json($formationRequest);
    }

    public function destroy($id)
    {
        $formationRequest = FormationRequest::findOrFail($id);
        $formationRequest->delete();
        return response()->json(null, 204);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $formationRequest = FormationRequest::findOrFail($id);
        $formationRequest->update(['status' => $request->status]);

        return response()->json($formationRequest);
    }
}
