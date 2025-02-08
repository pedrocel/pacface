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
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->uuid('organization_id')->nullable();
            $table->string('nome');  // Nome da turma (ex: "Turma A")
            $table->string('periodo');  // Período (ex: "Manhã", "Tarde", etc.)
            $table->text('descricao')->nullable();  // Descrição da turma (opcional)
            $table->foreignId('contexto_id')->constrained('contextos')->onDelete('cascade');  // Relacionamento com o contexto (ano letivo)
            $table->foreignId('professor_id')->nullable()->constrained('professores')->onDelete('set null');  // Relacionamento com o professor principal (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
