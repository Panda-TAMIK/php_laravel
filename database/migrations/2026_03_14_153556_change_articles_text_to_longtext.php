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
        // Требует doctrine/dbal. Пока колонка остаётся string(255).
        // После установки doctrine/dbal раскомментировать:
        // Schema::table('articles', function (Blueprint $table) {
        //     $table->longText('text')->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
