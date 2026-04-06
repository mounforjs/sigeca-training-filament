<?php

use App\Models\Capacitacion;
use App\Models\Componente;
use App\Models\User;
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
        Schema::create('capacitaciones_componentes', function (Blueprint $table) {
            $table->foreignIdFor(Capacitacion::class, "capacitacion_id");
            $table->foreignIdFor(User::class, "user_id");
            $table->foreignIdFor(Componente::class, "componente_id");
            $table->unsignedInteger("horas");
            $table->boolean("investigacion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitaciones_componentes');
    }
};
