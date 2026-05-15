<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'segments';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'order',
        'surah',
        'verse_start',
        'verse_end',
        'start_at',
        'end_at',
        'duration',
        'type',
        'scholar_id',
        'scholar_name',
        'audio_id',
        'tags',
        'confidence',
    ];

    protected $casts = [
        'start_at' => 'float',
        'end_at' => 'float',
        'duration' => 'float',
        'confidence' => 'float',
        'tags' => 'array',
    ];

    protected $appends = [
        'start_at_formatted',
        'end_at_formatted',
    ];

    protected $hidden = ['search_vector'];

    /**
     * Apply full‑text search and optional filters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $processedQuery
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, ?string $processedQuery, array $filters = [])
    {
        // Expression MUST match the index exactly
        $searchExpression = "
        setweight(to_tsvector('simple', coalesce(scholar_name, '')), 'A') ||
        setweight(to_tsvector('simple', coalesce(type, '')), 'B') ||
        setweight(to_tsvector('simple', coalesce(tags->>'topics', '')), 'C') ||
        setweight(to_tsvector('simple', coalesce(tags->>'keywords', '')), 'D')
    ";

        if ($processedQuery) {
            $quoted = $query->getConnection()->getPdo()->quote($processedQuery);

            $query->select('segments.*')
                ->selectRaw("ts_rank({$searchExpression}, to_tsquery('simple', {$quoted})) as rank")
                ->whereRaw("{$searchExpression} @@ to_tsquery('simple', {$quoted})");
        } else {
            $query->select('segments.*')
                ->selectRaw('0 as rank');
        }

        // Apply filters
        if (!empty($filters['scholar_id'])) {
            $query->where('scholar_id', $filters['scholar_id']);
        }
        if (!empty($filters['scholar_name'])) {
            $query->where('scholar_name', 'ilike', '%' . $filters['scholar_name'] . '%');
        }
        if (!empty($filters['surah'])) {
            $query->where('surah', $filters['surah']);
        }
        if (!empty($filters['verse'])) {
            $verse = (int) $filters['verse'];
            $query->where('verse_start', '<=', $verse)
                ->where('verse_end', '>=', $verse);
        }
        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (!empty($filters['topic'])) {
            $query->whereRaw("tags->>'topics' ILIKE ?", ['%' . $filters['topic'] . '%']);
        }

        // Ordering
        if ($processedQuery) {
            $query->orderBy('rank', 'desc');
        }
        $query->orderBy('confidence', 'desc');
        $query->orderBy('order', 'asc');
        $query->orderBy('start_at', 'asc');

        return $query;
    }

    public function getStartAtFormattedAttribute()
    {
        return gmdate('H:i:s', $this->start_at);
    }

    public function getEndAtFormattedAttribute()
    {
        return gmdate('H:i:s', $this->end_at);
    }

}
