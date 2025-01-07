<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();

            $table->string('prenom')->nullable(true);
            $table->string('nom')->nullable(true);
            $table->string('ville')->nullable(true);
            $table->string('cabinet')->nullable(true);
            $table->integer('status')->default(0);
            $table->string('adresse')->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('email')->nullable(false);
            $table->string('phone')->nullable(false);
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
        Schema::dropIfExists('experts');
    }
}
