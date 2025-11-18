<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('synopsis')->nullable();
            $table->enum('type', ['Anime', 'Manga']);
            $table->enum('status', ['Airing', 'Finished', 'Not yet aired']);
            $table->string('imageUrl');

            $table->timestamps();
        });
    }


};
