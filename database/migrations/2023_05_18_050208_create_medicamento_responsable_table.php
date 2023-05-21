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
        Schema::create('medicamento_responsable', function (Blueprint $table) {
            $table->foreignId('medicamento_id')->constrained();
            $table->unsignedBigInteger('responsable_id');

            $table->foreign('responsable_id')->references('id')->on('responsables')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamento_responsable');
    }
};
