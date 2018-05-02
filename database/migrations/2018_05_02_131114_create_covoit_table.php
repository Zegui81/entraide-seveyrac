<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCovoitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covoit', function (Blueprint $table) {
            // Paramètres
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';
            
            // Champs
            $table->increments('id');
            $table->string('origine', 100);
            $table->string('destination', 100);
            $table->text('commentaire')->nullable();
            $table->dateTime('depart');
            $table->integer('nbPlace');
            $table->unsignedInteger('user_id')->default(1);
        });
        
        Schema::table('covoit', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covoit');
    }
}
