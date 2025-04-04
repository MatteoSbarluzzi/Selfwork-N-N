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
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();

            // Foreign Key per article con cascata
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')
                  ->references('id')->on('articles')
                  ->onDelete('cascade');

            // Foreign Key per tag con cascata
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
                  ->references('id')->on('tags')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tag');
    }
};
