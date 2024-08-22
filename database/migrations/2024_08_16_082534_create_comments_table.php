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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->text('comment'); // Comment text
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Foreign Key to posts
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key to users
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
