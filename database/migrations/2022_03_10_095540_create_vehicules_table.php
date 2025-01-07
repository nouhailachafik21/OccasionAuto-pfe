<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('matricule');
            $table->string('puissance_fiscale');
            $table->string('kilometrage');
            $table->double('prix');
            $table->date('annee_mc')->nullable(true);
            $table->string('moteur')->nullable(true);
            $table->text('description')->nullable(true);
            $table->boolean('premiere_main');
            //////////////////////////////////////////////////
           
            /*$table->integer('options_note')->nullable(true);
            $table->integer('consommables_note')->nullable(true);
            $table->integer('moteur_note')->nullable(true);
            $table->integer('routier_note')->nullable(true);
            $table->integer('chassis_note')->nullable(true);
            $table->integer('exterieur_note')->nullable(true);
            $table->integer('interieur_note')->nullable(true);*/

            //////////////////////////////////////////////////
            $table->integer('ville_id')->unsigned();
            $table->integer('marque_id')->unsigned();
            $table->integer('modele_id')->unsigned();
            $table->integer('couleur_id')->unsigned();
            $table->integer('carburant_id')->unsigned();
            $table->integer('vehiculetype_id')->unsigned();
            $table->integer('vehiculecategorie_id')->unsigned()->nullable(true);
            $table->integer('transmission_id')->unsigned();
           

            $table->foreign('carburant_id')->references('id')->on('carburants');
            $table->foreign('vehiculetype_id')->references('id')->on('vehicule_types');
            $table->foreign('vehiculecategorie_id')->references('id')->on('vehicule_categories');
            $table->foreign('transmission_id')->references('id')->on('transmissions');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->foreign('modele_id')->references('id')->on('modeles');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->foreign('couleur_id')->references('id')->on('couleurs');
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
        Schema::dropIfExists('vehicules');
    }
}
