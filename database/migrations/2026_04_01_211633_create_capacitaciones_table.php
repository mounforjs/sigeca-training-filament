<?php

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\NivelFormacion;
use App\Models\Parroquia;
use App\Models\Proyecto;
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
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('descripcion');
            $table->foreignIdFor(Estado::class, 'estado_id')->nullable();
            $table->foreignIdFor(Municipio::class, 'municipio_id')->nullable();
            $table->foreignIdFor(Parroquia::class, 'parroquia_id')->nullable();
            $table->foreignIdFor(Proyecto::class, 'proyecto_id')->nullable();
            $table->foreignIdFor(NivelFormacion::class, 'nivel_formacion_id')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitacions');
    }
};
