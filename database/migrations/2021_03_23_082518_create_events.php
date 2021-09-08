<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->length(191)->unique();
            $table->text('description');
            $table->string('pic');
            $table->string('logo');
            $table->string('color');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('id_place')->length(11);
            $table->date('debut_registration');
            $table->date('fin_registration');
            $table->string('statut_registration');
            $table->string('statut_event');
            $table->integer('id_type')->length(11);
            $table->integer('id_categorie')->length(11);
            $table->integer('inscrip')->length(11);
            $table->integer('gratuit')->length(11);
            $table->integer('showev')->length(11);
            $table->string('frequence');
            $table->string('portee');
            $table->string('orientation');
            $table->string('firstYear');
            $table->string('website');
            $table->string('facebookLink')->default(null);
            $table->string('twitterLink')->default(null);
            $table->string('youtubeLink')->default(null);
            $table->string('linkedinLink')->default(null);
            $table->integer('private')->default('0');
            $table->integer('virtuel')->default('0');
            $table->string('online_url')->default(null);
            $table->string('mode')->default('Draft');
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
        Schema::dropIfExists('events');
    }
}
