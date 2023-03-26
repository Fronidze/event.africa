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
        Schema::create('festival_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('file_id')
                ->references('id')->on('files')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('sorting')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival_galleries');
    }
};
