<?php

use App\Models\Evaluacion;
use App\Models\NivelFormacion;
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
        Schema::create('evaluacion_nivel_formacion', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NivelFormacion::class, 'nivel_formacion_id')->constrained();
            $table->foreignIdFor(Evaluacion::class, 'evaluacion_id')->constrained();
            $table->unsignedInteger('ponderacion')->default(0);
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivelformacion_evaluacion');
    }
};
