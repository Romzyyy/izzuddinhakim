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
        Schema::create('my_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('slug')->unique(); 
            $table->text('content'); 
            $table->string('category');
            $table->string('image')->default('default.jpeg,png,jpg,gif,svgp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_blogs');
    }
};
