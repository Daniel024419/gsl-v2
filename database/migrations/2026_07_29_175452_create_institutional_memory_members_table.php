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
        Schema::create('institutional_memory_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tenure')->comment('Years served as chairperson, e.g. "2023-2025"');
            $table->string('image')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->foreignId('person_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->unsignedSmallInteger('date_from')->nullable()->after('person_id');
            $table->unsignedSmallInteger('date_to')->nullable()->after('date_from');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_memory_members');
    }
};