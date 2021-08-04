<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date("birth");
            $table->char("sexo", 1);
            $table->char("status_civil", 1)->nullable();
            $table->string("document");
            $table->string("email");
            $table->string("phone")->nullable();
            $table->string("cellphone")->nullable();
            $table->string("street")->nullable();
            $table->string("cep")->nullable();
            $table->string("number")->nullable();
            $table->string("district")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
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
        Schema::dropIfExists('patientes');
    }
}
