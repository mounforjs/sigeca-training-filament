<?php

use App\Models\ParametroEvaluacion;
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
        Schema::create('parametro_definiciones', function (Blueprint $table) {
            $table->id();
            $table->string('definicion');
            $table->unsignedInteger('puntuacion');
            $table->foreignIdFor(ParametroEvaluacion::class, "parametro_id")->constrained()->onDelete('cascade');
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametro_definicions');
    }
};
