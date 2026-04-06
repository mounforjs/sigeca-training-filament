<?php

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
        Schema::create('niveles_formacion', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->date("fecha");
            $table->foreignIdFor(Proyecto::class,"proyecto_id")->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivel_formacions');
    }
};
