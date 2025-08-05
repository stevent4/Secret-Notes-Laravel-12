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
        Schema::create('secret_notes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->text('note');
            $table->string('password')->nullable(); // hashed
            $table->boolean('viewed')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secret_notes');
    }
};
