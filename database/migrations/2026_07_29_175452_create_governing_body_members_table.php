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
        Schema::create('governing_body_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('role_id')->nullable()->after('name')->constrained('management_roles')->nullOnDelete();
            $table->boolean('is_visible')->default(true)->after('order');
            $table->string('image')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->foreignId('person_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governing_body_members');
    }
};