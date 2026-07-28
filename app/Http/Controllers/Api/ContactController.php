<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Sauvegarder le message
        $contact = Contact::create([
            ...$validated,
            'is_read' => false
        ]);

        // Envoyer un email (à implémenter)
        // Mail::to('contact@aaexpertise.com')->send(new ContactMessage($validated));

        return response()->json([
            'message' => 'Votre message a été envoyé avec succès',
            'contact' => $contact
        ], 200);
    }

    public function index()
    {
        $contacts = Contact::latest()->get();
        return response()->json($contacts);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);
        return response()->json($contact);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(null, 204);
    }
}
