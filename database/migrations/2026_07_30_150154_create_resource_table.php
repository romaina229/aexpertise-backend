<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['article', 'video', 'ebook', 'document']);
            $table->string('category');
            $table->string('file_url')->nullable();
            $table->string('video_url')->nullable(); // Pour les vidéos YouTube/Vimeo
            $table->string('thumbnail')->nullable();
            $table->integer('views')->default(0);
            $table->integer('downloads')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->date('published_at')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
