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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained();
            $table->text('description')->nullable();
            $table->foreignId('city_id')->constrained('cities');
            $table->string('rue');
            $table->string('address')->nullable();
            $table->string('pays')->nullable()->default('maroc');
            $table->string('code_zip')->nullable();
            $table->unsignedInteger('stars', false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
