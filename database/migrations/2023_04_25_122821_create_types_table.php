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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('hotel_id')->constrained();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('number_bed')->nullable();
            $table->float('price')->nullable();
            $table->float('tarif_mensuel', 4, 2)->nullable();
            $table->float('tarif_hebdomadaire', 4, 2)->nullable();
            $table->unsignedSmallInteger('NbrPersons')->nullable();
            $table->unsignedSmallInteger('room_size')->nullable();
            $table->enum('status', ['draft', 'active', 'inactive'])->default('draft');
            // $table->unsignedSmallInteger('discount')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
