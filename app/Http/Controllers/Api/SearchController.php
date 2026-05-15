<?php

namespace App\Http\Controllers\Api;

use App\Models\Segment;
use App\Services\SearchIntelligence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request, SearchIntelligence $intelligence)
    {
        $startTime = microtime(true);

        $validated = $request->validate([
            'q' => 'nullable|string|max:200',
            'scholar_id' => 'nullable|string',      
            'scholarId' => 'nullable|string',       
            'surah' => 'nullable|integer|min:1',
            'verse' => 'nullable|integer|min:1',
            'type' => 'nullable|in:tafsir,summary',
            'topic' => 'nullable|string|max:100',   
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        // Normalize scholar_id: if scholarId is present, use it
        if ($request->filled('scholarId') && !$request->filled('scholar_id')) {
            $request->merge(['scholar_id' => $request->scholarId]);
        }

        $processedQuery = $intelligence->process($validated['q']);
        
        $filters = $request->only(['scholar_id', 'surah', 'verse', 'type', 'topic']);

        $segments = Segment::search($processedQuery, $filters)
            ->paginate($validated['per_page'] ?? 20);

        $response = $segments->toArray();
        $processingTime = round((microtime(true) - $startTime) * 1000);

        $response['meta'] = [
            'query' => $validated['q'],
            'expanded_query' => $processedQuery,
            'processing_time_ms' => $processingTime,
            'result_count' => $segments->total(),
        ];

        return response()->json($response);
    }
}