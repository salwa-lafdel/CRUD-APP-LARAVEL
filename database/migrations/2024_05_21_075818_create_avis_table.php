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
        Schema::create('avis', function (Blueprint $table) {

            $table->unsignedBigInteger('idE');
            $table->foreign('idE')->references('codeE')->on('etudiants');

            $table->unsignedBigInteger('idF');
            $table->foreign('idF')->references('idf')->on('formations');
            $table->integer('points');
            $table->primary(['idE','idF']);//clé primaire composé


           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
