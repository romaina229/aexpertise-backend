<?php

namespace App\Http\Controllers\Api;

use App\Models\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $query = Resource::where('is_active', true);

        if ($request->has('type') && $request->type !== 'Tous' && $request->type !== 'Toutes') {
            $query->where('type', $request->type);
        }

        if ($request->has('category') && $request->category !== 'Toutes') {
            $query->where('category', $request->category);
        }

        if ($request->has('limit')) {
            $query->limit($request->limit);
        }

        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        $resources = $query->orderBy('published_at', 'desc')->get();

        return response()->json($resources);
    }

    public function show($id)
    {
        $resource = Resource::findOrFail($id);
        return response()->json($resource);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:article,video,ebook,document',
            'category' => 'required|string|max:255',
            'file_url' => 'nullable|string|max:500',
            'video_url' => 'nullable|string|max:500',
            'thumbnail' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
        ]);

        $resource = Resource::create($validated);
        return response()->json($resource, 201);
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'type' => 'in:article,video,ebook,document',
            'category' => 'string|max:255',
            'file_url' => 'nullable|string|max:500',
            'video_url' => 'nullable|string|max:500',
            'thumbnail' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
        ]);

        $resource->update($validated);
        return response()->json($resource);
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();
        return response()->json(null, 204);
    }

    public function incrementViews($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->incrementViews();
        return response()->json(['views' => $resource->views]);
    }

    public function incrementDownloads($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->incrementDownloads();
        return response()->json(['downloads' => $resource->downloads]);
    }

    public function toggleActive($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->update(['is_active' => !$resource->is_active]);
        return response()->json($resource);
    }

    public function toggleFeatured($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->update(['is_featured' => !$resource->is_featured]);
        return response()->json($resource);
    }
}