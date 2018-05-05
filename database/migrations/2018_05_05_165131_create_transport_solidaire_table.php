<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportSolidaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_solidaire', function (Blueprint $table) {
            // Paramètres
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';	
            
            $table->increments('id');
            $table->unsignedInteger('jour')->nullable();
            $table->dateTime('heureDepart')->nullable();
            $table->dateTime('heureRetour')->nullable();
            $table->text('commentaire')->nullable();
            $table->unsignedInteger('user_id')->default(1);
        });
        
        Schema::table('transport_solidaire', function (Blueprint $table) {
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
        Schema::dropIfExists('transport_solidaire');
    }
}
