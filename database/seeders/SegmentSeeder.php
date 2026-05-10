<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SegmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('segments')->insert([
            // ==================== SURAH AL-FATIHA (Surah 1) ====================
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
                    'topics' => ['beginning', 'invocation', 'basmalah'],
                    'keywords' => ['bismillah', 'opening', 'da sunan Allah', 'rahman', 'rahim'],
                    'language' => 'hausa',
                    'level' => 'beginner'
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
                    'topics' => ['guidance', 'mercy', 'praise'],
                    'keywords' => ['hidayah', 'shiriya', 'rahma', 'alhamdulillah'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.90
            ],
            [
                'id' => 's001_jafar_003',
                'order' => 3,
                'surah' => 1,
                'verse_start' => 3,
                'verse_end' => 4,
                'start_at' => 1800,
                'end_at' => 2950,
                'duration' => 1150,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_fatiha_part3',
                'tags' => json_encode([
                    'topics' => ['judgment_day', 'sovereignty'],
                    'keywords' => ['maliki yawmid din', 'master', 'judgment'],
                    'language' => 'hausa',
                    'level' => 'intermediate'
                ]),
                'confidence' => 0.92
            ],
            [
                'id' => 's001_jafar_004',
                'order' => 4,
                'surah' => 1,
                'verse_start' => 5,
                'verse_end' => 5,
                'start_at' => 2950,
                'end_at' => 4100,
                'duration' => 1150,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_fatiha_part4',
                'tags' => json_encode([
                    'topics' => ['worship', 'seeking_help'],
                    'keywords' => ['iyyaka nabudu', 'worship', 'seeking assistance'],
                    'language' => 'hausa',
                    'level' => 'intermediate'
                ]),
                'confidence' => 0.88
            ],
            [
                'id' => 's001_jafar_005',
                'order' => 5,
                'surah' => 1,
                'verse_start' => 6,
                'verse_end' => 7,
                'start_at' => 4100,
                'end_at' => 5600,
                'duration' => 1500,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_fatiha_part5',
                'tags' => json_encode([
                    'topics' => ['guidance', 'straight_path', 'righteous_people'],
                    'keywords' => ['sirat al mustaqim', 'guidance', 'prophets'],
                    'language' => 'hausa',
                    'level' => 'intermediate'
                ]),
                'confidence' => 0.93
            ],

            // ==================== SURAH AL-BAQARAH (Surah 2) ====================
            [
                'id' => 's002_jafar_001',
                'order' => 1,
                'surah' => 2,
                'verse_start' => 1,
                'verse_end' => 2,
                'start_at' => 0,
                'end_at' => 2100,
                'duration' => 2100,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_baqarah_opening',
                'tags' => json_encode([
                    'topics' => ['muqattaat', 'quran_guidance', 'taqwa'],
                    'keywords' => ['alif lam mim', 'guidance for righteous', 'belief in unseen'],
                    'language' => 'hausa',
                    'level' => 'advanced'
                ]),
                'confidence' => 0.94
            ],
            [
                'id' => 's002_jafar_002',
                'order' => 2,
                'surah' => 2,
                'verse_start' => 3,
                'verse_end' => 5,
                'start_at' => 2100,
                'end_at' => 3850,
                'duration' => 1750,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_baqarah_part2',
                'tags' => json_encode([
                    'topics' => ['prayer', 'charity', 'faith'],
                    'keywords' => ['salat', 'zakat', 'believers', 'success'],
                    'language' => 'hausa',
                    'level' => 'advanced'
                ]),
                'confidence' => 0.91
            ],
            [
                'id' => 's002_jafar_003',
                'order' => 3,
                'surah' => 2,
                'verse_start' => 6,
                'verse_end' => 7,
                'start_at' => 3850,
                'end_at' => 5100,
                'duration' => 1250,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_baqarah_part3',
                'tags' => json_encode([
                    'topics' => ['disbelievers', 'seal_of_hearts'],
                    'keywords' => ['kufr', 'sealed hearts', 'great punishment'],
                    'language' => 'hausa',
                    'level' => 'advanced'
                ]),
                'confidence' => 0.89
            ],

            // ==================== SURAH AL-IKHLAS (Surah 112) ====================
            [
                'id' => 's112_jafar_001',
                'order' => 1,
                'surah' => 112,
                'verse_start' => 1,
                'verse_end' => 4,
                'start_at' => 0,
                'end_at' => 1850,
                'duration' => 1850,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_ikhlas_full',
                'tags' => json_encode([
                    'topics' => ['tawheed', 'oneness_of_allah', 'attributes_of_allah'],
                    'keywords' => ['qul huwa allahu ahad', 'samad', 'neither born nor gives birth'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.96
            ],

            // ==================== ANOTHER SCHOLAR: Sheikh Ibn Uthaymeen ====================
            [
                'id' => 's001_uthaymeen_001',
                'order' => 1,
                'surah' => 1,
                'verse_start' => 1,
                'verse_end' => 1,
                'start_at' => 0,
                'end_at' => 890,
                'duration' => 890,
                'type' => 'tafsir',
                'scholar_id' => 'uthaymeen',
                'scholar_name' => "Sheikh Muhammad ibn Salih al-Uthaymeen",
                'audio_id' => 'uthaymeen_fatiha_verse1',
                'tags' => json_encode([
                    'topics' => ['basmalah', 'mercy_of_allah'],
                    'keywords' => ['bismillah', 'ar-rahman', 'ar-rahim'],
                    'language' => 'arabic',
                    'level' => 'intermediate'
                ]),
                'confidence' => 0.98
            ],
            [
                'id' => 's001_uthaymeen_002',
                'order' => 2,
                'surah' => 1,
                'verse_start' => 2,
                'verse_end' => 2,
                'start_at' => 890,
                'end_at' => 1700,
                'duration' => 810,
                'type' => 'tafsir',
                'scholar_id' => 'uthaymeen',
                'scholar_name' => "Sheikh Muhammad ibn Salih al-Uthaymeen",
                'audio_id' => 'uthaymeen_fatiha_verse2',
                'tags' => json_encode([
                    'topics' => ['praise', 'lordship'],
                    'keywords' => ['alhamdulillah', 'rabbil alamin'],
                    'language' => 'arabic',
                    'level' => 'intermediate'
                ]),
                'confidence' => 0.97
            ],

            // ==================== SURAH AL-FALAQ (Surah 113) ====================
            [
                'id' => 's113_uthaymeen_001',
                'order' => 1,
                'surah' => 113,
                'verse_start' => 1,
                'verse_end' => 5,
                'start_at' => 0,
                'end_at' => 1540,
                'duration' => 1540,
                'type' => 'tafsir',
                'scholar_id' => 'uthaymeen',
                'scholar_name' => "Sheikh Muhammad ibn Salih al-Uthaymeen",
                'audio_id' => 'uthaymeen_falaq_full',
                'tags' => json_encode([
                    'topics' => ['seeking_refuge', 'protection', 'evil'],
                    'keywords' => ['qul audhu bi rabbil falaq', 'envy', 'darkness', 'witchcraft'],
                    'language' => 'arabic',
                    'level' => 'intermediate'
                ]),
                'confidence' => 0.99
            ],

            // ==================== SURAH AN-NAS (Surah 114) ====================
            [
                'id' => 's114_jafar_001',
                'order' => 1,
                'surah' => 114,
                'verse_start' => 1,
                'verse_end' => 6,
                'start_at' => 0,
                'end_at' => 1680,
                'duration' => 1680,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_nas_full',
                'tags' => json_encode([
                    'topics' => ['seeking_refuge', 'whispers', 'protection'],
                    'keywords' => ['qul audhu bi rabbin nas', 'whisperer', 'jinn', 'mankind'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.94
            ],

            // ==================== SURAH AL-ASR (Surah 103) ====================
            [
                'id' => 's103_jafar_001',
                'order' => 1,
                'surah' => 103,
                'verse_start' => 1,
                'verse_end' => 3,
                'start_at' => 0,
                'end_at' => 1250,
                'duration' => 1250,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_asr_full',
                'tags' => json_encode([
                    'topics' => ['time', 'loss', 'righteous_deeds'],
                    'keywords' => ['wal asr', 'loss of mankind', 'faith', 'patience'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.92
            ],

            // ==================== ADDITIONAL SHORT SURAHS (Juz 'Amma) ====================
            [
                'id' => 's105_jafar_001',
                'order' => 1,
                'surah' => 105,
                'verse_start' => 1,
                'verse_end' => 5,
                'start_at' => 0,
                'end_at' => 980,
                'duration' => 980,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_fil_full',
                'tags' => json_encode([
                    'topics' => ['historical_events', 'divine_intervention'],
                    'keywords' => ['elephant', 'ababil', 'birds', 'abaabil'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.91
            ],
            [
                'id' => 's106_jafar_001',
                'order' => 1,
                'surah' => 106,
                'verse_start' => 1,
                'verse_end' => 4,
                'start_at' => 0,
                'end_at' => 760,
                'duration' => 760,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_quraysh_full',
                'tags' => json_encode([
                    'topics' => ['gratitude', 'worship', 'blessings'],
                    'keywords' => ['quraysh', 'winter journey', 'summer journey', 'kaaba'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.90
            ],
            [
                'id' => 's107_jafar_001',
                'order' => 1,
                'surah' => 107,
                'verse_start' => 1,
                'verse_end' => 7,
                'start_at' => 0,
                'end_at' => 1100,
                'duration' => 1100,
                'type' => 'tafsir',
                'scholar_id' => 'jafar_adam',
                'scholar_name' => "Sheikh Ja'afar Mahmud Adam",
                'audio_id' => 'jafar_adam_maun_full',
                'tags' => json_encode([
                    'topics' => ['charity', 'prayer', 'hypocrisy'],
                    'keywords' => ['small kindnesses', 'orphans', 'neglect prayer', 'show off'],
                    'language' => 'hausa',
                    'level' => 'beginner'
                ]),
                'confidence' => 0.93
            ],
        ]);
    }
}