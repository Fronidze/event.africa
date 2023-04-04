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
        Schema::create('team_translates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')
                ->references('id')->on('teams')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('lang', ['fr', 'en']);
            $table->string('code');
            $table->text('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_translates');
    }
};
