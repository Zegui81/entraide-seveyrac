<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintsOndelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
        });
        
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
        
        
        Schema::table('covoit', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
                
        Schema::table('covoit', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        
        Schema::table('transport_solidaire', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
                
        Schema::table('transport_solidaire', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
