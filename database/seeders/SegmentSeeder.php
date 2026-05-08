<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SegmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('segments')->insert([
            [
                'id' => 's001_jafar_001',
                'order' => 1,
                'surah' => 1,
                'verse_start' => 1,
                'verse_end' => 1,
                'start_at' => 0,
                'end_at' => 1057,
                'duration' => 1057,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_fatiha_full',
                'tags' => json_encode([
                    'topics' => ['beginning', 'invocation'],
                    'keywords' => ['bismillah', 'opening', 'da sunan Allah']
                ]),
                'confidence' => 0.95
            ],
            [
                'id' => 's001_jafar_002',
                'order' => 2,
                'surah' => 1,
                'verse_start' => 2,
                'verse_end' => 2,
                'start_at' => 1057,
                'end_at' => 1800,
                'duration' => 743,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_fatiha_part2',
                'tags' => json_encode([
                    'topics' => ['guidance', 'mercy'],
                    'keywords' => ['hidayah', 'shiriya', 'rahma']
                ]),
                'confidence' => 0.90
            ],
        ]);
    }
}