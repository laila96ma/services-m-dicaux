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
        Schema::create('rendez-vous', function (Blueprint $table) {
            $table->id();
            $table->integer('num');
            $table->datetime('date_RDV');
            $table->string('type_RDV');
            $table->foreignId('patientID')
            ->constrained('patient')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez-vous');
    }
};

