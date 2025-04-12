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
        Schema::create('vagas_semanais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profissional_id')->constrained('profissionals')->onDelete('cascade');
            $table->enum('dia_semana', ['domingo','segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado']);
            $table->integer('numero_vagas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas_semanais');
    }
};
