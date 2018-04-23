<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Paramètres
            $table->engine = 'InnoDB';	
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';	
            
            // Champs
            $table->increments('id');
            $table->string('email', 100);
            $table->string('password', 60);
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('telFixe', 10)->nullable();
            $table->string('telPortable', 10)->nullable();
            $table->boolean('actif')->default(false);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
