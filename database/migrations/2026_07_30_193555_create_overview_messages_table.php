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
        Schema::create('overview_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->nullable()->constrained()->nullOnDelete();
            $table->string('slug')->unique();
            $table->string('heading');
            $table->string('signature_title');
            $table->json('body');
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overview_messages');
    }
};
