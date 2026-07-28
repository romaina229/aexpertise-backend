<?php

namespace App\Http\Controllers\Api;

use App\Models\Registration;
use App\Models\Formation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'organization' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'message' => 'nullable|string'
        ]);

        $formation = Formation::findOrFail($validated['formation_id']);

        if ($formation->isFull()) {
            return response()->json([
                'message' => 'Cette formation est complète',
                'available_places' => 0
            ], 422);
        }

        $registration = Registration::create([
            ...$validated,
            'status' => 'pending'
        ]);

        $formation->increment('current_participants');

        // Envoyer un email de confirmation (à implémenter)
        // Mail::to($validated['email'])->send(new RegistrationConfirmation($registration));

        return response()->json([
            'message' => 'Inscription réussie',
            'registration' => $registration,
            'available_places' => $formation->availablePlaces()
        ], 201);
    }

    public function index()
    {
        $registrations = Registration::with('formation')->latest()->get();
        return response()->json($registrations);
    }

    public function show($id)
    {
        $registration = Registration::with('formation')->findOrFail($id);
        return response()->json($registration);
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);
        $registration->update($request->all());
        return response()->json($registration);
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();
        return response()->json(null, 204);
    }

    public function confirm($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->update(['status' => 'confirmed']);
        return response()->json($registration);
    }

    public function cancel($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->update(['status' => 'cancelled']);
        
        // Libérer une place
        $registration->formation->decrement('current_participants');
        
        return response()->json($registration);
    }
}
