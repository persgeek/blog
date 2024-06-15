<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_article_blog_slider', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_article_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('blog_slider_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_article_blog_slider');
    }
};
