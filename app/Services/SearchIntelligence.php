<?php

namespace App\Services;

class SearchIntelligence
{
    protected array $synonyms;

    public function __construct()
    {
        $this->synonyms = config('synonyms.map', []);
    }

    /**
     * Process the raw user query into a PostgreSQL tsquery string.
     *
     * @param string $rawQuery
     * @return string
     */
    public function process(string $rawQuery): string
{
    $query = mb_strtolower(trim($rawQuery));
    $query = str_replace(['ḥ','ṣ','ṭ','ʿ','ʾ'], ['h','s','t','',''], $query);
    $words = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);

    if (empty($words)) {
        return '';
    }

    $groups = [];

    foreach ($words as $word) {
        $terms = [$word . ':*'];

        $synonyms = $this->synonyms[$word] ?? [];
        $synonyms = array_slice($synonyms, 0, 3);
        foreach ($synonyms as $syn) {
            // Split multi‑word synonyms into AND‑ed terms
            $synWords = explode(' ', $syn);
            $synTerms = [];
            foreach ($synWords as $sw) {
                $synTerms[] = $sw . ':*';
            }
            $synTerm = '(' . implode(' & ', $synTerms) . ')';
            if (!in_array($synTerm, $terms)) {
                $terms[] = $synTerm;
            }
        }

        $groups[] = '(' . implode(' | ', $terms) . ')';
    }

    return implode(' & ', $groups);
}

    /**
     * If the term contains a space, wrap it in single quotes for tsquery.
     * Otherwise return as‑is.
     */
    private function quoteTsqueryTerm(string $term): string
    {
        return str_contains($term, ' ') ? "'" . $term . "'" : $term;
    }
}