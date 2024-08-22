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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Post title
            $table->text('content'); // Post content
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign Key to categories
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key to users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
