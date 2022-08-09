<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valider_restes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained();
            $table->foreignId('recette_id')->constrained();
            $table->string('type');
            $table->string('mac_address');
            $table->integer('reste');
            $table->integer('quantite');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valider_restes');
    }
};
