<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 1 FOR 1 TABLE
    // // Medicos
    // // Pacientes
    public function up(): void
    {   
        Schema::create('medico_paciente', function (Blueprint $table) {
            $table->id();
            
            //pacientes table
            $table->unsignedbigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            
            // medicos table
            $table->unsignedbigInteger('medico_id');
            $table->foreign('medico_id')->references('id')->on('medicos');

            $table->timestamps(); //updated_at / created_at
            $table->softDeletes(); //deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico_paciente');
    }
};
