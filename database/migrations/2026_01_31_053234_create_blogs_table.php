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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->string('title', 191);
            $table->string('slug', 191)->unique();

            $table->longText('content');
            $table->text('excerpt')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('category', 100)->index();
            $table->json('tags')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
