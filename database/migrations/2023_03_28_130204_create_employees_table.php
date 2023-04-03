<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('lage');
            $table->string('n_cin');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('sexe');
            $table->string('emploi');
            $table->integer('salaire');
            $table->string('role');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
