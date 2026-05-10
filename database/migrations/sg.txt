<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('segments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('order');
            $table->integer('surah');
            $table->integer('verse_start');
            $table->integer('verse_end');
            $table->float('start_at');
            $table->float('end_at');
            $table->float('duration');
            $table->string('type');
            $table->string('scholar_id');
            $table->string('scholar_name');
            $table->string('audio_id');
            $table->jsonb('tags');
            $table->float('confidence');
        });

        DB::statement("
            ALTER TABLE segments ADD COLUMN search_vector tsvector
            GENERATED ALWAYS AS (
                setweight(to_tsvector('simple', coalesce(scholar_name, '')), 'A') ||
                setweight(to_tsvector('simple', coalesce(type, '')), 'B') ||
                setweight(to_tsvector('simple', coalesce(tags->>'topics', '')), 'C') ||
                setweight(to_tsvector('simple', coalesce(tags->>'keywords', '')), 'D')
            ) STORED
        ");

        DB::statement("
            CREATE INDEX segments_search_idx ON segments USING GIN (search_vector)
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('segments');
    }
};