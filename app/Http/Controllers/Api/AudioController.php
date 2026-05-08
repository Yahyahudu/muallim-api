<?php

namespace App\Http\Controllers\Api;

use App\Models\Segment;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class AudioController extends Controller
{
    public function stream(string $audioId)
    {
        $segment = Segment::where('audio_id', $audioId)->first();

        if (!$segment) {
            return response()->json(['error' => 'Audio not found'], 404);
        }

        $filename = $audioId . '.mp3';
        $path = 'audio/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['error' => 'File missing'], 404);
        }

        $totalDuration = Segment::where('audio_id', $audioId)->max('end_at');

        return response()->json([
            'audio_id' => $audioId,
            'url' => Storage::disk('public')->url($path),
            'duration' => (float) $totalDuration,   // in seconds

        ]);
    }
}