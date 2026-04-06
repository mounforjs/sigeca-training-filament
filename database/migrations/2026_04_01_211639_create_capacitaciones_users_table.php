<?php

use App\Models\Capacitacion;
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
        Schema::create('capacitaciones_users', function (Blueprint $table) {
            $table->foreignIdFor(Capacitacion::class, 'capacitacion_id')->constrained();
            $table->foreignIdFor(User::class, 'user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitaciones_user');
    }
};
