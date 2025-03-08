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
        Schema::create('class_room', function (Blueprint $table) {
            $table->id();
            $table->uuid('organization_id')->nullable();
            $table->integer('id_room'); // Relacionamento com a tabela de salas (rooms), agora como integer
            $table->integer('id_class'); // Relacionamento com a tabela de turmas (classes), agora como integer
            $table->integer('id_teacher'); // Relacionamento com a tabela de usuários (professores), agora como integer
            $table->integer('id_discipline'); // Relacionamento com a tabela de disciplinas (disciplines), agora como integer
            $table->date('date'); // Data da aula
            $table->time('start_time'); // Hora de início da aula
            $table->time('end_time'); // Hora de término da aula
            $table->integer('aula_number'); // Número da aula no dia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_room');
    }
};
