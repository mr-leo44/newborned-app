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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('family_name')->unique();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('parents_email');
            $table->string('parents_phone');
            $table->string('father_id');
            $table->string('mother_id');
            $table->string('wedding_act')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
