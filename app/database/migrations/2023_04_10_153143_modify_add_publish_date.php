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
        Schema::table('news_galleries', function (Blueprint $table) {
            $table->timestamp('publish_at')->default('now()');
        });
    }

    public function down(): void
    {
        Schema::table('news_galleries', function (Blueprint $table) {
            $table->dropColumn('publish_at');
        });
    }
};
