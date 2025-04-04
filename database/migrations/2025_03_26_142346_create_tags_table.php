<?php

use App\Models\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $tags = ['Attualità', 'Musica', 'E-Sports', 'Cronaca', 'Satira', 'Scientifico', 'Trend', 'Formazione', 'Motori'];

        foreach ($tags as $tag){
            tag::create([
                'name' => $tag
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
