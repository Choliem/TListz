<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tiers', function (Blueprint $table) {
            $table->id();

            // Foreign key to posts table with ON DELETE CASCADE
            $table->foreignId('post_id')
                ->constrained('posts', 'id')
                ->onDelete('cascade') // Automatically delete tiers when the related post is deleted
                ->index('tiers_post_id');

            $table->string('name');
            $table->integer('rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiers');
    }
};
