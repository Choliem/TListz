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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            // Foreign key to posts table with ON DELETE CASCADE
            $table->foreignId('post_id')
                ->constrained('posts', 'id')
                ->onDelete('cascade') // Automatically delete items when the related post is deleted
                ->index('items_post_id');

            $table->foreignId('tier_id')
                ->nullable()
                ->constrained('tiers', 'id')
                ->onDelete('set null') // Optional: Set to NULL if the tier is deleted
                ->index('items_tier_id');

            $table->string('name');
            $table->string('image'); // Path or URL to the image
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
