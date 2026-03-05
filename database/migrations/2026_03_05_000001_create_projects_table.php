<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->string('technologies')->nullable(); // comma-separated
            $table->string('github_link')->nullable();
            $table->string('demo_link')->nullable();
            $table->string('image')->nullable();
            $table->json('screenshots')->nullable();
            $table->json('features')->nullable();
            $table->json('results')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
