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
        Schema::create('keyword_templates', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('slug')->unique();
            $table->text('title_template')->nullable();
            $table->text('title_region_template')->nullable();
            $table->text('meta_description_template')->nullable();
            $table->text('meta_region_description_template')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyword_templates');
    }
};
