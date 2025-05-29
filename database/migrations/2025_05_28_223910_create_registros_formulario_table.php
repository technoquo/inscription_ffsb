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
        Schema::create('registros_formulario', function (Blueprint $table) {
        $table->id();
        $table->integer('adultos');
        $table->integer('adolescentes');
        $table->integer('menores');
        $table->integer('combo_cantidad')->nullable();
        $table->integer('combo_veg')->nullable();
        $table->integer('combo_frites')->nullable();
        $table->integer('combo_mix')->nullable();
        $table->integer('combo_mix_veg')->nullable();
        $table->integer('combo_mix_frites_boison_sauce')->nullable();
        $table->integer('combo_mix_frites_veg_boison_sauce')->nullable();
        $table->integer('ticket')->nullable();
        $table->string('visite')->nullable();
        $table->text('comentario')->nullable();
        $table->string('fullname')->nullable();
        $table->string('email');
        $table->decimal('total', 8, 2);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_formulario');
    }
};
