<?php

namespace App\Http\Controllers\Api;

use App\Models\Segment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TafsirController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'surah'      => 'nullable|integer|min:1|max:114',
            'scholar_id' => 'nullable|string',
            'type'       => 'nullable|in:tafsir,summary',
            'per_page'   => 'nullable|integer|min:1|max:100',
        ]);

        $query = Segment::query();

        if ($surah = $validated['surah'] ?? null) {
            $query->where('surah', $surah);
        }
        if ($scholar = $validated['scholar_id'] ?? null) {
            $query->where('scholar_id', $scholar);
        }
        if ($type = $validated['type'] ?? null) {
            $query->where('type', $type);
        }

        $segments = $query->orderBy('order')
                          ->orderBy('start_at')
                          ->paginate($validated['per_page'] ?? 20);

        return response()->json($segments);
    }

    public function show(string $id)
    {
        $segment = Segment::find($id);
        if (!$segment) {
            return response()->json(['error' => 'Segment not found'], 404);
        }
        return response()->json(['data' => $segment]);
    }
}