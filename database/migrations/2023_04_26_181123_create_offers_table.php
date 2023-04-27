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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->morphs('offerable');
            $table->decimal('price', 7, 2);
            $table->integer('discount');
            $table->dateTime('available_from');
            $table->dateTime('available_until');
            $table->boolean('active');
            $table->foreignId('user_id')->constrained(); // person who create this offer
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
