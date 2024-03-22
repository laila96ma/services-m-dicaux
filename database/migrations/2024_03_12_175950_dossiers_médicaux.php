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
        Schema::create('dossier_médicaux', function (Blueprint $table) {
            $table->id();
            $table->string('antécédents_médicaux');
            $table->string('allergies');
            $table->string('médicament');
            $table->string('maladie');
            $table->string('analyse')->nullable();;
            $table->boolean('repos')->default(false);
            $table->integer('nbr_repos')->nullable();;
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
        Schema::dropIfExists('dossier_médicaux');
    }
};
