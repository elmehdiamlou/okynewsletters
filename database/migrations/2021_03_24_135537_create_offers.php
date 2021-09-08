<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length(191)->unique();
            $table->text('description');
            $table->string('pic');
            $table->string('logo');
            $table->string('color');
            $table->date('date_pub');
            $table->date('postuler_avant');
            $table->integer('id_place')->length(11);
            $table->date('fin_registration');
            $table->string('statut_registration');
            $table->string('statut_offre');
            $table->integer('id_type')->length(11);
            $table->integer('id_categorie')->length(11);
            $table->date('date_demarrage');
            $table->integer('convention')->length(11);
            $table->integer('duree')->length(11);
            $table->string('domaine');
            $table->string('poste');
            $table->string('niveau_etude');
            $table->string('firstYear');
            $table->string('website');
            $table->string('facebookLink')->default(null);
            $table->string('twitterLink')->default(null);
            $table->string('youtubeLink')->default(null);
            $table->string('linkedinLink')->default(null);
            $table->integer('private')->default('0');
            $table->integer('virtuel')->default('0');
            $table->string('online_url')->default(null);
            $table->string('mode')->default(null);
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
        Schema::dropIfExists('offers');
    }
}
