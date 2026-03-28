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
        Schema::create('kassatickets', function (Blueprint $table) {
            $table->id();
            $table->string('klant', length: 50)->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('ticket_path')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kassatickets');
    }
};
